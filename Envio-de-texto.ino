#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "Familia Mora";  
const char* password = "88136473";  
const char* serverUrl = "http://192.168.0.18/envio.php?mensaje=Hola desde ESP32";

void setup() {
    Serial.begin(115200);
    WiFi.begin(ssid, password);
    
    while (WiFi.status() != WL_CONNECTED) {
        delay(1000);
        Serial.println("Conectando a WiFi...");
    }
    Serial.println("Conectado!");

    HTTPClient http;
    http.begin(serverUrl);
    int httpResponseCode = http.GET();

    if (httpResponseCode > 0) {
        Serial.print("Respuesta del servidor: ");
        Serial.println(http.getString());
    } else {
        Serial.print("Error en la solicitud HTTP: ");
        Serial.println(httpResponseCode);
    }
    http.end();
}

void loop() {
}
