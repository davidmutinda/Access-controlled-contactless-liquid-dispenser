#include <WiFi.h>
#include <HTTPClient.h>
#include <LiquidCrystal_I2C.h>
#include <SPI.h>
#include <MFRC522.h>
#include <RTClib.h>

#define ledRed 27
#define ledYellow 14
#define ledGreen 12
#define buzzerPin 25
#define relayPin 26
#define trigPin 32
#define echoPin 33
#define trigPin2 16
#define echoPin2 4
#define ss_Pin 5                  
#define rst_Pin 17                 
MFRC522 mfrc522(ss_Pin,rst_Pin);   
LiquidCrystal_I2C lcd(0x27,16,2);
RTC_DS3231 rtc;


float amount;
float delayPeriod;
float volume;
float reference=250;

float duration;
float duration2;
float distance;
float distance2;
String StrUID="";

const char* ssid = "David";
const char* password = "mutinder98";



void setup() {
  // put your setup code here, to run once:
  pinMode(ledRed,OUTPUT);
  pinMode(ledYellow,OUTPUT);
  pinMode(ledGreen,OUTPUT);
  pinMode(trigPin,OUTPUT);
  pinMode(echoPin,INPUT);
  pinMode(trigPin2,OUTPUT);
  pinMode(echoPin2,INPUT);
  pinMode(relayPin,OUTPUT);
  pinMode(buzzerPin,OUTPUT);
  
  digitalWrite(relayPin,HIGH);
 
  SPI.begin();            //Init SPI bus
  mfrc522.PCD_Init();     //Init MFRC522 card
  rtc.begin();
  rtc.adjust(DateTime(F(__DATE__), F(__TIME__))); 
  lcd.begin();
  lcd.clear();
  lcd.print("WELCOME>>>>>>");

  delay(3000);

  WiFi.begin(ssid, password);  
  while (WiFi.status() != WL_CONNECTED) {
    lcd.setCursor(0,1);
    lcd.print("Connecting...");
  }
  
  lcd.setCursor(0,1);
  lcd.print("Connected!!!!");
  delay(2000);
}

void loop() {
  resetAccess();
  waterLevel();
}

void resetAccess(){
  WiFiClient client;
  HTTPClient http;    
  DateTime time = rtc.now();
  String postAccess;
   
  String period;
  period=time.timestamp(DateTime::TIMESTAMP_TIME);
    
    
  if (period=="16:20:00"){
       postAccess = "Resetaccess";

       http.begin(client,"http://192.168.43.244/rfidquantity/accesstimes.php");  
       http.addHeader("Content-Type", "application/x-www-form-urlencoded"); 

       http.POST(postAccess);  
       delay(500);  
  }
  
}
void waterLevel(){
  digitalWrite(trigPin,LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin,HIGH);
  delayMicroseconds(2);
  digitalWrite(trigPin,LOW);
  duration=pulseIn(echoPin,HIGH);
  distance=(duration/2)*0.0343;
  digitalWrite(trigPin,LOW);

  if (distance>=16){
    lcd.clear();
    lcd.print("Liquid level");
    lcd.setCursor(0,1);
    lcd.print("is low!!!");
    digitalWrite(ledRed,HIGH);
    digitalWrite(ledYellow,LOW);
    digitalWrite(ledGreen,LOW);
    delay(1000);
  }
  else if (distance<14&&distance>8){
    digitalWrite(ledRed,LOW);
    digitalWrite(ledYellow,HIGH);
    digitalWrite(ledGreen,LOW);
    senseCup();
  }
  else if (distance<=8){
    digitalWrite(ledRed,LOW);
    digitalWrite(ledYellow,LOW);
    digitalWrite(ledGreen,HIGH);
    senseCup();
  }
  
}

void senseCup(){
  digitalWrite(trigPin2,LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin2,HIGH);
  delayMicroseconds(2);
  digitalWrite(trigPin2,LOW);
  duration2=pulseIn(echoPin2,HIGH);
  distance2=(duration2/2)*0.0343;
  digitalWrite(trigPin2,LOW);

  if (distance2<=5){
    lcd.clear();
    lcd.print("Scan your card>>");
    delay(500);
    accessControl();
}
  
  else{
    digitalWrite(relayPin,HIGH);
    lcd.clear();
    lcd.print("Place the cup  ");
    lcd.setCursor(0,1);
    lcd.print("on the tray");
    delay(500);
}
}

void accessControl(){
  WiFiClient client;
  HTTPClient http;    

  if (rfidScan()) {
    
    String postData;
    postData = "UIDresult=" + StrUID;

    http.begin(client,"http://192.168.43.244/rfidquantity/index.php"); 
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); 

    int httpCode=http.POST(postData);   
    String access=http.getString();    

    if (access=="invalid"){
      lcd.clear();
      lcd.print("Invalid card!");
      digitalWrite(buzzerPin,HIGH);
      delay(1200);
      digitalWrite(buzzerPin,LOW);
      lcd.setCursor(0,1);
      digitalWrite(relayPin,HIGH);
      invaliduid();
      delay(4000);
    }

    else if (access=="exceeded"){
      lcd.clear();
      lcd.print("Access denied!");
      digitalWrite(relayPin,HIGH);
      digitalWrite(buzzerPin,HIGH);
      delay(1200);
      digitalWrite(buzzerPin,LOW);
      delay(2000);
      lcd.clear();
      lcd.print("Please come back");
      lcd.setCursor(0,1);
      lcd.print("tomorrow");
      delay(3000);
    }
    
    else {
      welcomeMessage();
      delay(2000);
      lcd.clear();
      lcd.print("Remaining:"+access);
      dispense();
      lcd.clear();
      lcd.print("Remove cup!");
      digitalWrite(buzzerPin,HIGH);
      delay(100);
      digitalWrite(buzzerPin,LOW);
      delay(100);
      digitalWrite(buzzerPin,HIGH);
      delay(100);
      digitalWrite(buzzerPin,LOW);
      delay(100);
      digitalWrite(buzzerPin,HIGH);
      delay(100);
      digitalWrite(buzzerPin,LOW);
      delay(100);
      digitalWrite(buzzerPin,HIGH);
      delay(100);
      digitalWrite(buzzerPin,LOW);
      delay(100);
      digitalWrite(buzzerPin,HIGH);
      delay(100);
      digitalWrite(buzzerPin,LOW);
      delay(4000);
    }  
  }
  delay(500);
  
}


int rfidScan() {
  if (!mfrc522.PICC_IsNewCardPresent()) {
    return 0;
  }
  if (!mfrc522.PICC_ReadCardSerial()) {
    return 0;
  }
  StrUID="";

  
  for (uint8_t i=0;i<4;i++){
    StrUID.concat(String(mfrc522.uid.uidByte[i],HEX));
  }
  
  StrUID.toUpperCase();
  mfrc522.PICC_HaltA();
  return 1;
}

void welcomeMessage(){
  WiFiClient client;
  HTTPClient http;
  http.begin(client,"http://192.168.43.244/rfidquantity/firstname.txt");

  int httpcode=http.GET();
  String firstname= http.getString();
  lcd.clear();
  lcd.print("Access granted!");
  digitalWrite(buzzerPin,HIGH);
  delay(100);
  digitalWrite(buzzerPin,LOW);
  delay(1000);
  lcd.setCursor(0,1);
  lcd.print("Welcome "+firstname);
}


void dispense(){
  WiFiClient client;
  HTTPClient http;
  http.begin(client,"http://192.168.43.244/rfidquantity/quantity.txt");

  int httpcode=http.GET();
  String quantity= http.getString();
  lcd.setCursor(0,1);
  lcd.print("Quantity:"+quantity+"ml");
  volume=quantity.toFloat();
  delay(1000);
  
  digitalWrite(relayPin,LOW);
  delayPeriod=(volume/reference)*40000;
  delay(delayPeriod);
  digitalWrite(relayPin,HIGH);
  delay(3000);
}

void invaliduid(){
   WiFiClient client;
  HTTPClient http;  
  String invalidData;
    invalidData = "invalid=" + StrUID;

    http.begin(client,"http://192.168.43.244/rfidquantity/invaliduid.php"); 
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); 

    int httpCode=http.POST(invalidData);   
}


 
