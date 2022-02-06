# ACCESS-CONTROLLED CONTACTLESS LIQUID DISPENSER #

![pour (2)](https://user-images.githubusercontent.com/96857630/152315897-77563ef2-4230-4c42-804d-a10387b5d90d.jpg)


## ABSTRACT ##
The access-controlled contactless liquid dispenser prevents the spread of covid-19 by providing a system that dispenses liquids e.g. beverages, without contact. This dispenser only dispenses the beverages to bona fide members. Anyone that doesn’t possess valid identification is denied access to the beverages in the dispenser. This dispenser also increases efficiency by providing a system that dispenses a specified amount to users and also limits the number of times the users can dispense in a day. The amount dispensed and the number of times a user can use it in a day depends on the user's membership i.e. regular or premium.

## SYSTEM COMPONENTS ##
The table below shows the main hardware components making up the system.

Component     | Image
------------- | -------------
Nodemcu-32s  | ![image](https://user-images.githubusercontent.com/96857630/152630669-5feaf0a7-669a-46d0-9adc-9d407f35d67b.png)
HCSR04 Ultrasonic sensor  |  ![image](https://user-images.githubusercontent.com/96857630/152630705-16a4d3e8-c59e-495d-b7b0-be8341678737.png) 
Micro submersible pump  |  ![image](https://user-images.githubusercontent.com/96857630/152630731-abd02838-afbb-4f53-93bd-caa93f507f09.png) 
5V relay module |  ![image](https://user-images.githubusercontent.com/96857630/152630746-3850d9c5-58a7-471a-80a7-6e032fb4d034.png)
RC522 RFID module  |  ![image](https://user-images.githubusercontent.com/96857630/152630761-67278db7-437a-40c7-9cc9-3b80c3a78a20.png)
DS3231 RTC module  |  ![image](https://user-images.githubusercontent.com/96857630/152630779-726cec53-72f5-4b9c-a9eb-c88b3c79737b.png)
LCD 1602 module  |  ![image](https://user-images.githubusercontent.com/96857630/152630800-55ddd680-6070-47c4-9025-6dabb2e35fd1.png)

## SYSTEM OVERVIEW ##

### Block diagram ###
The figure below gives a clear diagrammatic representaion of how the components making up the system are connected.

![image](https://user-images.githubusercontent.com/96857630/152321292-e1de0f70-d5d4-4fda-a2a2-490bd74d38b1.png)

### Flowchart diagram ###
The flowchart of the system is shown below, which shows the program flow once the system is powered.

![image](https://user-images.githubusercontent.com/96857630/152321427-593299c8-ca8c-4600-ac3b-6e6dbaf529b2.png)




### Circuit schematic ###
The figure below shows how the components and modules are connected to the microcontroller.

![image](https://user-images.githubusercontent.com/96857630/152321563-5286e7a3-564b-4fc3-9a64-ddec8f4da5fd.png)

## RESULTS ##
### Circuit board ###
The figures below show the top and side views of the fabricated circuit respectively.
             

 ![image](https://user-images.githubusercontent.com/96857630/152342291-fc9d119f-da30-4b3c-a6cb-e2a52402f220.png)
 
 

 
 ![image](https://user-images.githubusercontent.com/96857630/152342837-43888c3f-7b59-47e3-9a83-4054d1606926.png)
 

### Dispensing system ###
The [photos](https://github.com/davidmutinda/Access-controlled-contactless-liquid-dispenser/tree/main/Photos) file contains images of the dispensing system when it is switched on.
* The dispenser first [connects to the internet](https://github.com/davidmutinda/Access-controlled-contactless-liquid-dispenser/blob/main/Photos/Successful%20process/1.jpg).
* It then checks if the beverage level is sufficient, if not it [displays an error mesage](https://github.com/davidmutinda/Access-controlled-contactless-liquid-dispenser/blob/main/Photos/Beverage%20level%20low.jpg).
* The system then asks the user to [place the cup](https://github.com/davidmutinda/Access-controlled-contactless-liquid-dispenser/blob/main/Photos/Successful%20process/2.jpg). 
* The user is then asked to [scan his/her RFID card](https://github.com/davidmutinda/Access-controlled-contactless-liquid-dispenser/blob/main/Photos/Successful%20process/3.jpg). If the card is not valid, an [error message](https://github.com/davidmutinda/Access-controlled-contactless-liquid-dispenser/blob/main/Photos/Invalid%20RFID%20card.jpg) is diplayed. If the card is valid but the access times are exceeded, an [error message](https://github.com/davidmutinda/Access-controlled-contactless-liquid-dispenser/blob/main/Photos/Exceeded%20access%20times.jpg) is diplayed as well. If the card is valid and hasn't exceeded the access times, [access is granted](https://github.com/davidmutinda/Access-controlled-contactless-liquid-dispenser/blob/main/Photos/Successful%20process/4.jpg). The dispenser then begins [pumping specific volume](https://github.com/davidmutinda/Access-controlled-contactless-liquid-dispenser/blob/main/Photos/Successful%20process/5.jpg) of the liquid into the cup.


### Admin website ###
The images below show the admin website which shows users' data, and is used to register or delete users. Users can either be registered on the regular or premium membership plans. The admin is required to log in first before he/she can access the data.

 ![image](https://user-images.githubusercontent.com/96857630/152342689-727585c1-0edc-4e4f-a8d0-7840ccad9aa1.png)
 
 ![image](https://user-images.githubusercontent.com/96857630/152344950-650cb6f7-c27a-44e1-bd6a-6f6090c2d2f0.png)
 
 ![image](https://user-images.githubusercontent.com/96857630/152630572-5594cdf2-d666-4c8c-948e-d38b7a4b8086.png)





## CONCLUSION ##
 This dispenser can be employed in school cafeterias to ensure that every student is served with the beverages and also to minimize contact. The system could be improved by using biometric systems such as facial recognition instead of RFID.

