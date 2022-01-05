int led = 13; // We are going to make Pin 13 LED blink
int threshold = 28; // Change this to the level you want the light to come on
int volume;

void setup() {
  Serial.begin(9600);
  pinMode(led, OUTPUT);
}

void loop() {

  volume = analogRead(A0); // Read the value from the Analog PIN A0

  Serial.println(volume);
  delay(100);

  if (volume >= threshold) {
    digitalWrite(led, HIGH); //Turn ON Led
  } else {
    digitalWrite(led, LOW); // Turn OFF Led
  }

}
