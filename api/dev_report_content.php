<?php

//CABECERAS
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, private');
header('X-Content-Type-Options: nosniff');

//VALIDAR METODO
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
header('Allow: POST');
http_response_code(405);
echo json_encode(['success' => false, 'message' => 'Método no permitido.'], JSON_UNESCAPED_UNICODE);
exit;
}

//OBTENER SOLICITUD
$data = json_decode(file_get_contents('php://input'), true);

if(!is_array($data)){
http_response_code(400);
echo json_encode(['success' => false, 'message' => 'Solicitud JSON inválida.'], JSON_UNESCAPED_UNICODE);
exit;
}

//VALIDAR TIPO DE REPORTE
$reportType = (int)($data['apiERP_getReport'] ?? 0);

if($reportType !== 9001){
http_response_code(400);
echo json_encode(['success' => false, 'message' => 'Tipo de reporte inválido.'], JSON_UNESCAPED_UNICODE);
exit;
}

//PAGINACION
$page = filter_var($data['fil_Page'] ?? 1, FILTER_VALIDATE_INT);
$perPage = filter_var($data['fil_PerPage'] ?? 20, FILTER_VALIDATE_INT);

if($page === false || $page < 1 || $perPage === false || $perPage < 1 || $perPage > 100){
http_response_code(400);
echo json_encode(['success' => false, 'message' => 'Parámetros de paginación inválidos.'], JSON_UNESCAPED_UNICODE);
exit;
}

//FILTROS
$filterName = strtolower(substr(trim((string)($data['fil_dev_Name'] ?? '')), 0, 120));
$filterStatus = (string)($data['fil_dev_Status'] ?? '');

if(!in_array($filterStatus, ['', '0', '1'], true)){
http_response_code(400);
echo json_encode(['success' => false, 'message' => 'Filtro de estado inválido.'], JSON_UNESCAPED_UNICODE);
exit;
}

//FECHA SIMULADA PARA LOS REGISTROS
$filterDateStart = (string)($data['fil_date_start'] ?? '');
$demoDate = '2026-01-01';

if(preg_match('/^\d{4}-\d{2}-\d{2}(?:[ T]\d{2}:\d{2}:\d{2})?$/', $filterDateStart)){
$candidateDate = substr($filterDateStart, 0, 10);
$parsedDate = DateTimeImmutable::createFromFormat('!Y-m-d', $candidateDate);
if($parsedDate && $parsedDate->format('Y-m-d') === $candidateDate){
$demoDate = $candidateDate;
}
}

//GENERAR REGISTROS SIMULADOS
$rows = [];

for($i = 1; $i <= 57; $i++){

$demoName = 'Registro de desarrollo ' . $i;
$demoStatusId = $i % 2 === 0 ? 1 : 0;

if($filterName !== '' && stripos($demoName, $filterName) === false){
continue;
}

if($filterStatus !== '' && (int)$filterStatus !== $demoStatusId){
continue;
}

$rows[] = [
'setDemoId' => $i,
'setDemoName' => $demoName,
'setDemoDate' => $demoDate . ' 12:00:00',
'setDemoStatus' => $demoStatusId === 1 ? 'Activo' : 'Inactivo',
'setDemoAmount' => round($i * 13.75, 2)
];
}

//CALCULAR TOTAL DE REGISTROS FILTRADOS
$totalRecords = count($rows);
$totalPages = $totalRecords > 0 ? (int)ceil($totalRecords / $perPage) : 0;

//PAGINAR DESPUES DE FILTRAR
$offset = ($page - 1) * $perPage;
$pageRows = array_slice($rows, $offset, $perPage);

//CONTRATO OFICIAL DEL MOTOR DE REPORTES
$response = [
'success' => true,
'message' => [
'setOperations' => $pageRows,
'setPagination' => [
'page' => $page,
'perPage' => $perPage,
'totalRecords' => $totalRecords,
'totalPages' => $totalPages
],
'setTotals' => [
'setCurrencies' => (object)[]
]
]
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
exit;