# WebDevelopment
This is a web page made with PHP, XML and CSS. The onventional  web technologies (HTML and CSS) are not used.

## How to run
In order to run this project we need XAMMP.
1. Open the XAMPP control panel
2. Run Apache and MySQL services
3. Go to localhost/phpmyadmin in the website url and import the .sql file present in the repository.
4. Go inside the project and run the php file
5. An XML document is generated.
6. Open the XML and add the following line below the prefix (first line of the XML file)
   - ```xml
         <?xml-stylesheet type="text/css" href="catalog_17031105.css"?>
     ``
   - ```xml
         <DOCTYPE ITCompany SYSTEM "sample.dtd">
      ```
7. Finally, open the XML file in the browser.
    
