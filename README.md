# Phase III - Group 25

<h2>Table of Contents</h2>
 -> Authors <br> 
 -> How to Install  <br>
 -> Final Report  <br>
 
 <h2>Authors</h2>

    Anish Patel 100751489  
    David Fung 100767734  
    Nathan Yohannes 100749914  
    Saaruca Kugarajh 100751441 
    
    
 <h2>How to Install</h2>
 
 <h3>Disclaimer</h3>
  You must create your own database with the following tables: <br>
  - Customers<br>
  - Hosts<br>
  - Vehicles<br>
  - Bookings<br>
  
  The primary keys and foreign keys are listed below for each table.<br><br>
  
  **Customers**<br>
  Primary Key: c_id (integer datatype)<br>
  Foreign Keys: None<br><br>
  
  **Hosts**<br>
  Primary Key: h_id (integer datatype)<br>
  Foreign Keys: vehicle_id <br><br>
  
  **Vehicles**<br>
  Primary Key: v_id (integer datatype)<br>
  Foreign Keys: hosts_id <br><br>
  
  **Bookings**<br>
  Primary Key: b_id (integer datatype)<br>
  Foreign Keys: hosts_id, customer_id, vehicle_id <br><br>
  
 
  <h4>Downloading and Installing WAMP Server</h4>
    1. Open [this link](https://www.wampserver.com/en/)<br>
    2. Click **DOWNLOAD** in the navbar<br>
    3. Download the version of WampServer depending on which bit your PC is (32 or 64)<br>
    4. Open the .exe file (should be named wampserver(versionnumber)_x_(32 or 64, depends on PC))<br>
    5. Go through the installation steps and finish installing WampServer<br><br>
    
   <h4>Downloading and Installing Project Files</h4>
    1. Open up the folder named "Project Files" and download it's contents<br>
    2. Once it's contents have been downloaded, copy all the files and paste them to C:\wamp64\www\<br>
    3. After the files have been moved over to C:\wamp64\www, the project files have been installed<br><br>
    
   <h4>Running the program</h4>
    1. Run Wamp Server<br>
    2. Click the arrow on the task bar at the bottom right and left click on the WampServer icon and click "Localhost"<br>
    3. Once your default browser has opened, in the search bar type in "localhost/index.html"<br>
    4. If you have set a port in WampServer then you have to add your port number after localhost. Example, localhost:(portnumber)/index.html<br>
    5. The program is now running!
    
    
