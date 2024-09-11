#include <SPI.h>
#include <MFRC522.h>

const uint8_t RST_PIN = D3;
const uint8_t SS_PIN = D4;
// #define RST_PIN         D3          
// #define SS_PIN          D4

MFRC522 mfrc522(SS_PIN, RST_PIN);
MFRC522::MIFARE_Key key;        

int blockNum = 4;

byte bufferLen = 18;
byte readBlockData[18];

MFRC522::StatusCode status;




void setup() 
{
  Serial.begin(9600);
  
  
  SPI.begin();
  
  mfrc522.PCD_Init();
  Serial.println("Scan a MIFARE 1K Tag to write data...");
  
}

void loop()
{
  
  for (byte i = 0; i < 6; i++){
    key.keyByte[i] = 0xFF;
  }
  
  if ( ! mfrc522.PICC_IsNewCardPresent()){return;}
  
  if ( ! mfrc522.PICC_ReadCardSerial()) {return;}
  
  Serial.print("\n");
  Serial.println("**Card Detected**");
  
  Serial.print(F("Card UID:"));
  for (byte i = 0; i < mfrc522.uid.size; i++){
    Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
    Serial.print(mfrc522.uid.uidByte[i], HEX);
  }
  Serial.print("\n");
  
  Serial.print(F("PICC type: "));
  MFRC522::PICC_Type piccType = mfrc522.PICC_GetType(mfrc522.uid.sak);
  Serial.println(mfrc522.PICC_GetTypeName(piccType));
    
  
  byte buffer[18];
  byte len;
  
  Serial.setTimeout(20000L);
  
  Serial.println(F("---------------------------------------"));
  Serial.println(F("Enter Student ID, ending with #"));
  len = Serial.readBytesUntil('#', (char *) buffer, 16);
  
  for (byte i = len; i < 16; i++) buffer[i] = ' ';
  blockNum = 4;
  WriteDataToBlock(blockNum, buffer);
  ReadDataFromBlock(blockNum, readBlockData);
  dumpSerial(blockNum, readBlockData);
  
  Serial.println(F("---------------------------------------"));
  Serial.println(F("Enter First Name, ending with #"));
  len = Serial.readBytesUntil('#', (char *) buffer, 16);
  for (byte i = len; i < 16; i++) buffer[i] = ' ';
  blockNum = 5;
  WriteDataToBlock(blockNum, buffer);
  ReadDataFromBlock(blockNum, readBlockData);
  dumpSerial(blockNum, readBlockData);
  
  Serial.println(F("---------------------------------------"));
  Serial.println(F("Enter Last Name, ending with #"));
  len = Serial.readBytesUntil('#', (char *) buffer, 16);
  for (byte i = len; i < 16; i++) buffer[i] = ' ';
  blockNum = 6;
  WriteDataToBlock(blockNum, buffer);
  ReadDataFromBlock(blockNum, readBlockData);
  dumpSerial(blockNum, readBlockData);
  
  Serial.println(F("---------------------------------------"));
  Serial.println(F("Enter Phone Number, ending with #"));
  len = Serial.readBytesUntil('#', (char *) buffer, 16);
  for (byte i = len; i < 16; i++) buffer[i] = ' ';
  blockNum = 8;
  WriteDataToBlock(blockNum, buffer);
  ReadDataFromBlock(blockNum, readBlockData);
  dumpSerial(blockNum, readBlockData);
  Serial.println(F("---------------------------------------"));
  Serial.println(F("Enter Address, ending with #"));
  len = Serial.readBytesUntil('#', (char *) buffer, 16);
  for (byte i = len; i < 16; i++) buffer[i] = ' ';
  blockNum = 9;
  WriteDataToBlock(blockNum, buffer);
  ReadDataFromBlock(blockNum, readBlockData);
  dumpSerial(blockNum, readBlockData);
}



void WriteDataToBlock(int blockNum, byte blockData[]) 
{
  status = mfrc522.PCD_Authenticate(MFRC522::PICC_CMD_MF_AUTH_KEY_A, blockNum, &key, &(mfrc522.uid));
  if (status != MFRC522::STATUS_OK){
    Serial.print("Authentication failed for Write: ");
    Serial.println(mfrc522.GetStatusCodeName(status));
    return;
  }
  
  else {
    //Serial.print("Authentication OK - ");
  }
  
  status = mfrc522.MIFARE_Write(blockNum, blockData, 16);
  if (status != MFRC522::STATUS_OK) {
    Serial.print("Writing to Block failed: ");
    Serial.println(mfrc522.GetStatusCodeName(status));
    return;
  }
  else {
    //Serial.println("Write OK");
  }
  
}


void ReadDataFromBlock(int blockNum, byte readBlockData[]) 
{
  for (byte i = 0; i < 6; i++) {
    key.keyByte[i] = 0xFF;
  }
  
  status = mfrc522.PCD_Authenticate(MFRC522::PICC_CMD_MF_AUTH_KEY_A, blockNum, &key, &(mfrc522.uid));
  
  if (status != MFRC522::STATUS_OK){
   Serial.print("Authentication failed for Read: ");
   Serial.println(mfrc522.GetStatusCodeName(status));
   return;
  }
  else {
    //Serial.print("Authentication OK - ");
  }

  status = mfrc522.MIFARE_Read(blockNum, readBlockData, &bufferLen);
  if (status != MFRC522::STATUS_OK){
    Serial.print("Reading failed: ");
    Serial.println(mfrc522.GetStatusCodeName(status));
    return;
  }
  else {
    //readBlockData[16] = ' ';
    //readBlockData[17] = ' ';
    //Serial.println("Read OK");  
  }
  
}

void dumpSerial(int blockNum, byte blockData[]) 
{
  Serial.print("\n");
  Serial.print("Data saved on block");
  Serial.print(blockNum);
  Serial.print(": ");
  for (int j=0 ; j<16 ; j++){
    Serial.write(readBlockData[j]);
  }
  Serial.print("\n");

  
  for( int i = 0; i < sizeof(readBlockData);  ++i )
   readBlockData[i] = (char)0; 
}
