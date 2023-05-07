#include <DHTesp.h>
#include <SPI.h>
#include <WiFi.h>
#include <WiFiClient.h>
#include <HTTPClient.h>

byte mac[] = { 0xA8, 0x61, 0x0A, 0xAE, 0xF7, 0x31 };
String serverName = "http://192.168.31.120:80/index.php";

DHTesp dht;
const int DHT_PIN = 15;

long interval = 1000; //Reading interval
long prevMs = 0;
unsigned long currentMs = 0;

int temperature = 0;
int humidity = 0;
String data;

void setup() {
  Serial.begin(115200);
  delay(4000);
  dht.setup(DHT_PIN, DHTesp::DHT22);
  Serial.println(1);
  WiFi.begin("Wokwi-GUEST", "", 6);
  while (WiFi.status() != WL_CONNECTED) {
    delay(100);
    Serial.print(".");
  }
  Serial.println(" Connected!");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  currentMs = millis();
  if ((currentMs - prevMs) > interval) {
    //Check WiFi connection status
    if(WiFi.status()== WL_CONNECTED){
      HTTPClient http;   
      String serverPath = serverName + "?temperature=24.37";
      http.begin(serverPath);  //Specify destination for HTTP request
      String data = "{\"temp\":\""+(String)dht.getTemperature()+"\",\"hum\":\""+(String)dht.getHumidity()+"\",\"light\":\"1005.14\"}";
      Serial.println(data);
      http.addHeader("Content-Type", "application/json");
      int httpResponseCode = http.POST(data);   //Send the actual POST request
      
      if(httpResponseCode>0){
      
        String response = http.getString();                       //Get the response to the request
      
        Serial.println(httpResponseCode);   //Print return code
        Serial.println(response);           //Print request answer
      
      }else{
      
        Serial.print("Error on sending POST: ");
        Serial.println(httpResponseCode);
      
      }
      
      http.end();  //Free resources
    }
    else {
      Serial.println("WiFi Disconnected");
    }
    prevMs = millis();
  }

}
