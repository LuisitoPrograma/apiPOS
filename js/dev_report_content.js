window.apiERPDevelopmentLoadPage = async function(currentReportType){
if(currentReportType !== 9001) return;

const root = document.getElementById('dev_report_content_root');

if(!root) return;

root.replaceChildren();

const title = document.createElement('h1');
title.textContent = 'New Page Report Content';

const description = document.createElement('p');
description.textContent = `Report Type: ${currentReportType}`;

root.append(title, description);
};