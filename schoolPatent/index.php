<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles.css">
    <script src="https://unpkg.com/vue@next"></script>
    <title>Школьный патент</title>
</head>
<body>
    <nav>
        <h4 class="title">Школьный патент</h4>
    </nav>
    <!-- MAIN -->
    <main id="main">
        <table v-if="rowdata.length>0">
            <thead>
                <th v-for="key in Object.keys(rowdata[0])">{{key}}</th>
            </thead>
            <tbody id="table_content">
                <tr v-for="item in rowdata">
                    <td v-for="key in Object.keys(rowdata[0])">{{item[key]}}</td>
                </tr>
            </tbody>
        </table>
        <div class="nums_links" v-if="pagesCount > 1 && rowdata.length>0">
            <a href="#" class="link" v-for="i in pagesCount" @click="getTableData(i)">{{i}}</a>
        </div>
        <div v-if="rowdata.length==0">
           Подождите идет загрузка...
        </div>
    </main>
    <!-- END MAIN -->
    <footer>
        <span>©2023, Шаманаев Данилл Сергеевич ИС-20</span>
        <span id="test">тел. +79774117570 </span>
    </footer>

<!-- SCRIPTS -->

    <script>
        const TableApp = {
            data() {
                return {
                    part_fname:'',
                    part_sname:'',
                    part_address:'',
                    rowdata:[],
                    pagesCount:3,
                }
            },
            methods: {
                addItem(id,test) {
                    var my_object = {
                        id:this.id,
                        test:this.test,
                    };
                    this.rowdata.push(my_object);
                },
                async getTableData(page = 1) {
                    this.rowdata = [];
                    const rowCount = 25;

                    async function getDataFromServer(url, query) {
                        const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json' 
                        },
                        body: JSON.stringify({sql:query}),
                    }).then(function(response) {
                            if (response.status >= 200 && response.status < 300) {
                                return response.text()
                            }
                            throw new Error(response.statusText)
                        })
                        .then(function(response) {
                            return response;
                        })
                        return response;
                    }
                    let countQuery = "SELECT count(*) FROM patents";
                    let pagesResponse = await getDataFromServer('http://schoolpatent/server.php', countQuery);
                    let rowsCount = Object.values(JSON.parse(pagesResponse))[0]["count(*)"];
                    this.pagesCount = Math.round(rowsCount / rowCount);

                    let query = `SELECT contacts.first_name as 'Имя_участника', contacts.last_name as 'Фамилия_участника',adresses.city as 'Город_участника',repr.first_name as 'Имя_представителя',repr.last_name as 'Фамилия_представителя',address.city as 'Город представителя',patents.annotation as 'Аннотация'FROM patents JOIN contacts ON contacts.id = patents.id_participant JOIN contacts repr ON repr.id = patents.id_representative JOIN adresses ON adresses.id = contacts.id_address JOIN adresses address On address.id = repr.id_address limit ${rowCount} offset ${(page-1) * rowCount};`;
                    let dataTable = await getDataFromServer('http://schoolpatent/server.php', query);

                    let parse = Object.values(JSON.parse(dataTable));
                    this.rowdata = parse; 
                },
            },
        }

        const app  = Vue.createApp(TableApp);
        const vm = app.mount("#main");

        async function setDataToTable(page) {
            await vm.getTableData(page);
        }
        setDataToTable();

    </script>
</body>
</html>

