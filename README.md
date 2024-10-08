# Flex - A Movie and Series Streaming Platform

Welcome to the **Flex** project! Follow the steps below to set up and run the Flex movie and series streaming platform on your local machine.

## Prerequisites

Before you begin, ensure that you have the following installed on your computer:

- [WampServer](https://www.wampserver.com/en/): A local server environment for Windows.

## Installation Instructions

1. **Download the Project**

   Download the zip file containing the **Flex** project from the GitHub repository.

2. **Extract the Files**

   Extract the contents of the downloaded zip file to a location of your choice on your computer.

3. **Set Up WampServer**

   - If you haven’t already installed WampServer, download and install it from the [WampServer website](https://www.wampserver.com/en/).
   - After installation, start WampServer. You should see a WampServer icon in the system tray.

4. **Place the Project Files**

   - Navigate to the installation directory of WampServer. By default, this is located at `C:\wamp64\` (or `C:\wamp\` if you are using an older version).
   - Open the `www` folder within the WampServer installation directory.
   - Copy the extracted project folder and paste it into the `www` folder.

5. **Access the Project**

   - Open your web browser and type `http://localhost/[your_project_folder_name]` in the address bar, replacing `[your_project_folder_name]` with the name of the project folder you placed in the `www` directory.
   - You should now see the **Flex** movie and series streaming platform running on your local server.
     
5. **Create Virtual Host**

   - Open your web browser and type `http://localhost` in the address bar, you will see `Add a Virtual Host in left down side`.
   - Click the option you will see **virtual host name which you entered like xyz.com** then place the project path in the **complete absolute path** box.
   - Project path is the path where the project you stored in **www** folder. 

## Additional Information

- Ensure that WampServer is running and that the server icon in the system tray is green. If it’s red or orange, there might be an issue with the server setup or configuration.
- If you encounter any issues, check the WampServer logs or project documentation for troubleshooting tips.

Thank you for using **Flex**! If you have any questions or need further assistance, please feel free to open an issue on the GitHub repository.
