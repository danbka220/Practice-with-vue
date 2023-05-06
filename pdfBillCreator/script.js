function tableToObj(table) {
    var data = [];
    for (var i = 1; i < table.rows.length; i++) { 
        var tableRow = table.rows[i]; 
        var rowData = []; 
        for (var j = 0; j < tableRow.cells.length-1; j++) { 
            rowData.push(tableRow.cells[j].innerHTML);
        } 
        data.push(rowData); 
    } 
    return data; 
}

async function sendData() {
    let dataObj = {
        clientName:document.getElementById('clientTitle').value,
        clientAddress:document.getElementById('clientAddress').value,
        clientInn:document.getElementById('companyInn').value,
        clientNumber:document.getElementById('clientTel').value,
        companyName:document.getElementById('companyTitle').value,
        companyAddress:document.getElementById('companyAddress').value,
        companyInn:document.getElementById('companyInn').value,
        companyKpp:document.getElementById('companyKpp').value,
        companyNumber:document.getElementById('companyTel').value,
        companyBank:document.getElementById('companyBank').value,
        companyBillBank:document.getElementById('bankInvoiceNumber').value,
        companyBik:document.getElementById('companyBik').value,
        companyBill:document.getElementById('companyInvoiceNumber').value,
        companyBuh:document.getElementById('companyBuh').value,
        companyDir:document.getElementById('companyDir').value,
        date:document.getElementById('invoiceDate').value,
        invoiceNumber:document.getElementById('invoiceNumber').value,
        sum:getSumFromTable(),
        data:tableToObj(document.querySelector('table')),
    }

    const url = 'pdfCreator.php';
    const data = dataObj;
    getDataFromServer(url,data);
}

function getSumFromTable() {
    let tableData = tableToObj(document.querySelector('table'));
    let sum = 0;
    for (let item of tableData) {
        sum += Number(item[4]);
    }

    return sum;
}

async function getDataFromServer(url, data) {
    const response = await fetch(url, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json' 
    },
    body: JSON.stringify(data),
}).then(function(response) {
        window.open("Bill.pdf");
    })
}

function initVue() {
    const app = Vue.createApp({
        data() {
            return {
                dataRows: [],
            }
        },
        methods: {
            addNewRow() {
                let dataObj = {0:"Услуга",1:"2",2:"шт.",3:"5000",4:"10000"}
                this.dataRows.push(dataObj);
            },
            removeRow(row) {
                this.dataRows.splice(this.dataRows.indexOf(row),1);
            },
            updateTable() {
                let table = tableToObj(document.querySelector('table'));
                this.dataRows = table;

                for(let row of this.dataRows) {
                    row[4] = Number(row[3]) * Number(row[1]);
                }
            },
        },
        mounted() {
            this.addNewRow();
        }
    });

    app.mount('#table');
}

window.addEventListener("DOMContentLoaded", () => {
    initVue();
    document.querySelector('form').onsubmit = function() { 
        sendData();
        return false;
    }

});