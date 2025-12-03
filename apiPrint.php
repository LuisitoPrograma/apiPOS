<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

//LOGS
$debugLog = __DIR__ . DIRECTORY_SEPARATOR . 'apiprint_debug.log';

//FUNCION LOGS
function debug_log($label, $data = null){
global $debugLog;
$time = date('Y-m-d H:i:s');
$line = "[$time] $label";
if ($data !== null) {
$line .= ' - ' . var_export($data, true);
}
$line .= PHP_EOL;
file_put_contents($debugLog, $line, FILE_APPEND);
}

//FUNCION RESPONSE
function send_response($ok, $msg){
debug_log("RESPONSE $msg");
echo json_encode([
"success" => $ok,
"message" => $msg
], JSON_UNESCAPED_UNICODE);
exit;
}

//INICIO
debug_log('INICIO SCRIPT', [
'_POST_keys'  => array_keys($_POST),
'_FILES_keys' => array_keys($_FILES)
]);

//DECODIFICAR JSON
if(!isset($_POST['printData'])){
debug_log('FALLO: printData no está en $_POST', $_POST);
send_response(false, "Print Data.");
}

$data = json_decode($_POST['printData'], true);
debug_log('printData decodificado', $data);

//POST DATA
$setPrinterName  = $data['setPrinterName'] ?? '';
$setPrint        = isset($data['setPrint']) ? (int)$data['setPrint'] : 0;
$setPdfName      = $data['setPdfName'] ?? '';

//SANITIZAR NOMBRE DE PDF
$setPdfName = str_replace(["\r", "\n"], '', $setPdfName);
$setPdfName = trim($setPdfName);
$setPdfName = preg_replace('/[\\\\\\/:"*?<>|]+/', '_', $setPdfName);

debug_log('POST DATA', [
'setPrinterName' => $setPrinterName,
'setPrint'       => $setPrint,
'setPdfName'     => $setPdfName
]);

//VALIDAR DATA
if($setPrint != 1 || empty($setPdfName)){
debug_log('FALLO: Validación de datos', [
'setPrint'   => $setPrint,
'setPdfName' => $setPdfName,
'rawData'    => $data
]);
send_response(false, "Print Data.");
}

//PROCESAR PDF
$pdfBlob = null;
$pdfDebug = [];

if(isset($_FILES['pdfBlob'])){
$pdfDebug['files_meta'] = $_FILES['pdfBlob'];
if($_FILES['pdfBlob']['error'] === UPLOAD_ERR_OK){
$tmpName = $_FILES['pdfBlob']['tmp_name'];
$fileType = @mime_content_type($tmpName);
$pdfDebug['mime_type'] = $fileType;
if ($fileType && stripos($fileType, 'pdf') !== false) {
$pdfBlob = file_get_contents($tmpName);
$pdfDebug['pdf_size'] = strlen($pdfBlob);
} else {
$ext = strtolower(pathinfo($_FILES['pdfBlob']['name'], PATHINFO_EXTENSION));
$pdfDebug['file_ext'] = $ext;
if($ext === 'pdf'){
$pdfBlob = file_get_contents($tmpName);
$pdfDebug['pdf_size'] = strlen($pdfBlob);
$pdfDebug['note'] = 'Aceptado por extensión .pdf aunque mime no sea pdf exacto';
} else {
$pdfDebug['error_desc'] = "Tipo de archivo no es PDF";
}
}
} else {
$pdfDebug['php_upload_error'] = $_FILES['pdfBlob']['error'];
}
} else {
$pdfDebug['error_desc'] = "pdfBlob no está en \$_FILES";
}

debug_log('DEBUG PDF', $pdfDebug);

//PDF OBLIGATORIO
if($pdfBlob === null){
debug_log('FALLO: pdfBlob es null');
send_response(false, "PDF.");
}

//API PRINT FOLDER
$targetFolder = "C:\\apiPrint";
$folderDebug = [
"targetFolder"  => $targetFolder,
"is_dir"        => is_dir($targetFolder),
"is_writable"   => is_writable($targetFolder),
"php_user"      => get_current_user()
];
debug_log('DEBUG FOLDER', $folderDebug);

if(!is_dir($targetFolder) || !is_writable($targetFolder)){
debug_log('FALLO: Carpeta apiPrint no existe o no es escribible');
send_response(false, "apiPrint Not Found.");
}

//GUARDAR PDF
$pdfFilePath = $targetFolder . DIRECTORY_SEPARATOR . $setPdfName;
$bytes = @file_put_contents($pdfFilePath, $pdfBlob);

$savePdfDebug = [
'pdfFilePath' => $pdfFilePath,
'bytes'       => $bytes,
'last_error'  => error_get_last()
];
debug_log('GUARDAR PDF', $savePdfDebug);

if($bytes === false){
send_response(false, "PDF Save.");
}

//GENERAR ID PRINT
$idPrint = uniqid();

//JSON DATA
$json_data = [
"pdfUrl"      => $pdfFilePath,
"idPrint"     => $idPrint,
"printerName" => $setPrinterName
];

//GUARDAR JSON DATA EN TXT
$txtFilePath = $targetFolder . DIRECTORY_SEPARATOR . $idPrint . ".txt";
$txtResult = @file_put_contents($txtFilePath, json_encode($json_data, JSON_UNESCAPED_UNICODE));

$saveTxtDebug = [
'txtFilePath' => $txtFilePath,
'result'      => $txtResult,
'last_error'  => error_get_last()
];
debug_log('GUARDAR TXT', $saveTxtDebug);
if($txtResult === false){
send_response(false, "TXT Save.");
}

// RESPUESTA EXITOSA
debug_log('OK: Print Sent Successfully', [
'pdfFilePath' => $pdfFilePath,
'txtFilePath' => $txtFilePath
]);
send_response(true, "Print Sent Successfully !!!");