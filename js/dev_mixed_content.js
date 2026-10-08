window.apiERPDevelopmentLoadPage = async function(currentReportType){
if(currentReportType !== 9002) return;

const root = document.getElementById('dev_mixed_content_root');

if(!root) return;

root.replaceChildren();

const title = document.createElement('h1');
title.textContent = 'New Page Mixed Content';

const description = document.createElement('p');
description.textContent = `Report Type: ${currentReportType}`;

root.append(title, description);
};