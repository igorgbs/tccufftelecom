// Bibliotecas
#include <SPI.h>
#include <String.h>
#include <Ethernet.h>
#include <EmonLib.h>

// Instância de um monitor de energia
EnergyMonitor emon1;

// Variáveis referentes ao rele
int pino_rele1 = 7;
boolean ligado = true;


//Informacoes de endereco IP, gateway, mascara de rede
byte mac[] = { 0x90, 0xA2, 0xDA, 0x00, 0x9B, 0x36 };
byte ip[] = { 192, 168, 0, 108 };  //IP Arduino
byte servidor[] = { 192, 168, 0, 104 };  //IP Servidor
byte gateway[] = { 192, 168, 0, 1 }; //IP Gateway
byte subnet[] = { 255, 255, 255, 0 }; //Mascara de Sub-Rede

EthernetServer server(80); //Porta Sensor
EthernetClient cliente; //Conexão Sensor - BD

String readString;

unsigned long previousMillis = 0;
const long interval = 5920;

void setup() {
  
  Ethernet.begin(mac, ip, gateway, subnet);
  Serial.begin(9600);
  server.begin();
  pinMode(pino_rele1, OUTPUT);
  emon1.current(1, 111.1); //Porta Analógica 1  
 
  //Desliga o rele
  digitalWrite(pino_rele1, HIGH);
  
}

void loop() {

  //Variáveis Sensor 
  float corrente = emon1.calcIrms(1480);
  float potencia = corrente * 127.0;

  EthernetClient client = server.available();
  unsigned long currentMillis = millis(); //EmonLib

  if (currentMillis - previousMillis >= interval){
    previousMillis = currentMillis;

    // Conexao Sensor -> localhost:8095
    if (cliente.connect(servidor, 8095)) {
            
      cliente.print("GET /arduino_final/php7/salvardados7.php?"); //Diretório onde localiza-se o procedimento salvar dados
      cliente.print("corrente="); //nome coluna banco_de_dados (URL)
      cliente.print(corrente); //nome coluna banco_de_dados
      cliente.print("&potencia="); ////nome coluna banco_de_dados (URL)
      cliente.println(potencia); //nome coluna banco_de_dados
      
      cliente.stop();
    }
    else {
      

      cliente.stop();
    }
  }
  
  if(client) 
  {
    while(client.connected())
    {
      if(client.available()) 
      {
        char c = client.read();
        if(readString.length() < 100) {
          readString += (c);
        }
        if(c == '\n')
        {
          //Controle do rele1
          Serial.println(readString);
          
          //URL para ligar o Rele 1
          if (readString.indexOf("?ligar") > 0) //Leitura da URL
          {
            digitalWrite(pino_rele1, LOW);
            
            ligado = false;
          }
          else
          {
            //URL para desligar o Rele 1
            if (readString.indexOf("?desligar") > 0) //Leitura da URL
            {
              digitalWrite(pino_rele1, HIGH);
              
              ligado = true;
            }
          }   

          readString = "";
 
          //Pagina Web                         
          client.println("HTTP/1.1 200 OK");
          client.println("Content-Type: text/html");
          client.println();
         
          client.println("<!doctype html>");
          client.println("<html>"); //Começa HTML
          client.println("<center>"); //Começa Center
          client.println("<title>ARDUINO_FINAL</title>");
          client.println("<meta name=\"viewport\" content=\"width=320\">");
          client.println("<meta name=\"viewport\" content=\"width=device-width\">");
          client.println("<meta charset=\"utf-8\">");
          client.println("<meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=no\">");          
          client.println("<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>");
          client.println("<meta name='viewport' content='width=720, initial-scale=0.5' />");
          client.println("<meta http-equiv=\"refresh\" content=\"3; URL=http://192.168.0.108\">");  // IP Arduino
          
          client.println("<link rel='stylesheet' type='text/css' href='http://localhost:8095/arduino_final/rele_low_memory/automacao_residencial.css' />");
          client.println("<script type='text/javascript' src='http://localhost:8095/arduino_final/rele_low_memory/automacao_residencial.js'></script>");                                  

          //Printa Corrente
          client.println("<font size=\"5\" face=\"verdana\">Corrente(A) = </font>");
          client.println(corrente); //nome coluna banco_de_dados
          client.println("</font><br>"); //Pular Linha

          //Printa Potência
          client.println("<font size=\"5\" face=\"verdana\">Potencia(W) = </font>");
          client.println(potencia); //nome coluna banco_de_dados
          client.println("</font><br>");
          
          //(LINK VOLTAR) client.println("<p><a href=\"http://localhost:8095/arduino_final/php7/\" target=\"_blank\">Verificar Histórico</a></p>");
          
          client.print("<div id='rele'></div><div id='estado' style='visibility: hidden;'>");
          client.print(ligado);
          client.println("</div>");
          client.println("<div id='botao'></div>");
          client.println("<script>AlteraRele1()</script>");
          client.println("</div>");

          client.println("</center>"); //Acaba Center
          client.println("</html>"); //Acaba HTML

        
          delay(1);
          client.stop();
        }
      }
    }
  }
}
