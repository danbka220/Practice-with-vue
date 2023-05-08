const app = Vue.createApp({
    data() {
        return {
            temperature: 0,
            humidity: 0,
            luminosity: 0
        }
    },
    methods: {
        async getDataFromServer() {
            let query = "SELECT * FROM info ORDER BY id DESC LIMIT 1";
            let dataTable = await getDataFromServer('http://gardensensors/getSensorsData.php', query);
            let parsed = Object.values(JSON.parse(dataTable));
            this.temperature = parsed[0]['temperature'];
            this.humidity = parsed[0]['humidity'];
            this.luminosity = parsed[0]['luminosity'];
        }
    },
    mounted() {
        setInterval(() => {
            this.getDataFromServer()
        },1000);
    }
});

window.onload = function(){
    app.mount("#app");
};

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