//CONFIGURACION DEL REPORTE DE DESARROLLO
window.apiERPDevelopmentReport = {
reportType: 9001,
title: 'Nuevo Reporte de Desarrollo',
description: 'Consulta, filtra y administra los registros del nuevo reporte.',
apiEndpoint: './api/dev_report_content.php',
dateRanges: ['day', 'week', 'month', 'year'],

//COLUMNAS DE LA TABLA Y EXPORTACION
columns: [
{ text: 'ID', name: 'setDemoId', width: '80px', widthExcel: 12 },
{ text: 'Nombre', name: 'setDemoName', width: '250px', widthExcel: 35 },
{ text: 'Fecha', name: 'setDemoDate', width: '170px', widthExcel: 24 },
{ text: 'Estado', name: 'setDemoStatus', width: '120px', widthExcel: 18 },
{ text: 'Importe', name: 'setDemoAmount', width: '120px', widthExcel: 18 }
],

//RENDERIZAR CELDAS CON EL MOTOR OFICIAL
renderCell(td, rowData, colTitle){
const column = window.apiERPDevelopmentReport.columns.find(col => col.text === colTitle);
if(!column) return false;

const value = rowData[column.name];

if(column.name === 'setDemoAmount'){
const amount = Number(value);
td.style.textAlign = 'right';
td.textContent = Number.isFinite(amount) ? amount.toFixed(2) : '0.00';
return true;
}

if(column.name === 'setDemoId'){
td.style.textAlign = 'center';
}

td.textContent = value == null ? '' : String(value);
return true;
},

//OBTENER FILTROS EXCLUSIVOS DEL MODULO
getFilters(){
return {
fil_dev_Name: document.getElementById('dev_report_content_filter_name')?.value.trim() || '',
fil_dev_Status: document.getElementById('dev_report_content_filter_status')?.value || ''
};
},

//REINICIAR FILTROS EXCLUSIVOS
resetFilters(){
const nameInput = document.getElementById('dev_report_content_filter_name');
const statusInput = document.getElementById('dev_report_content_filter_status');

if(nameInput) nameInput.value = '';
if(statusInput) statusInput.value = '';
},

//RESTAURAR FILTROS AL CANCELAR
restoreFilters(filters){
const nameInput = document.getElementById('dev_report_content_filter_name');
const statusInput = document.getElementById('dev_report_content_filter_status');

if(nameInput) nameInput.value = String(filters.fil_dev_Name ?? '');
if(statusInput) statusInput.value = String(filters.fil_dev_Status ?? '');
}

};

//INICIALIZAR ELEMENTOS EXCLUSIVOS DEL REPORTE
window.apiERPDevelopmentLoadPage = async function(currentReportType){
if(currentReportType !== 9001) return;

const container = document.getElementById('div_section_options');
if(!container || document.getElementById('dev_report_content_filters')) return;

const section = document.createElement('div');
section.id = 'dev_report_content_filters';
section.className = 'filter-card';

const nameLabel = document.createElement('label');
nameLabel.className = 'form-label';
nameLabel.htmlFor = 'dev_report_content_filter_name';
nameLabel.textContent = 'Nombre:';

const nameInput = document.createElement('input');
nameInput.id = 'dev_report_content_filter_name';
nameInput.type = 'search';
nameInput.maxLength = 120;
nameInput.autocomplete = 'off';
nameInput.className = 'form-control';
nameInput.placeholder = 'Buscar por nombre';

const statusLabel = document.createElement('label');
statusLabel.className = 'form-label';
statusLabel.htmlFor = 'dev_report_content_filter_status';
statusLabel.textContent = 'Estado:';

const statusInput = document.createElement('select');
statusInput.id = 'dev_report_content_filter_status';
statusInput.className = 'form-control';

[
{ value: '', text: 'Todos' },
{ value: '1', text: 'Activo' },
{ value: '0', text: 'Inactivo' }
].forEach(item => {
const option = document.createElement('option');
option.value = item.value;
option.textContent = item.text;
statusInput.appendChild(option);
});

section.append(nameLabel, nameInput, statusLabel, statusInput);

const footer = container.querySelector('.rptux_filterFooter');
container.insertBefore(section, footer || null);
};