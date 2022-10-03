#include <SoftwareSerial.h> //Para ligar o módulo HC-05 noutros pinos que não o 0 e 1 (RX\TX)

#define RxD 7                //Arduino pin connected to Tx of HC-05
#define TxD 8                //Arduino pin connected to Rx of HC-05

SoftwareSerial blueToothSerial(RxD,TxD); //3.3v entre o pino 8 do Arduino e o RX do módulo

void setup()
{
  // inicializar as 2 portas serial:
  Serial.begin(38400);          //Para o arduino comunicar com o PC 
  blueToothSerial.begin(38400);  //-> HC-05 AT mode baud rate is 38400
  
   pinMode(RxD, INPUT);
   pinMode(TxD, OUTPUT);
     
 } 
 
void loop() {
  
  if (blueToothSerial.available()) {         //PORTA DO BLUETOOTH RX + TX (7 e 8) | Escrever as respostas do módulo
    int inByte = blueToothSerial.read();
    Serial.write((char)inByte); 
   }
  

  if (Serial.available()) {                   // Ler a porta Serial do Arduino para depois enviar os comandos ao módulo
    int inByte = Serial.read();
    blueToothSerial.print((char)inByte);     //Na janela Serial do IDE temos de escolher a opção "Both NL & CR" e o baud de 38400 
   
 //blueToothSerial.print("\r\n"); //No HC-05 todos os comandos têm de acabar assim
  }
}
