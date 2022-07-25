# Rogers DRM panel

# The project is now set as public and orignal repo is moved to personal  GET server.
## A valid ID is required in case you need help reach me at : https://t.me/python911




Install fresh ubuntu image with Ubuntu18.x  \
Install required libs from install.sh \

Start Panel installaton \
wget -O install.sh https://raw.githubusercontent.com/streamsaw/rogers_panel/main/rogers_install.sh && chmod 777 *.sh && ./install.sh 

Wait for installer to finish & Update panel \
wget -O update.sh https://raw.githubusercontent.com/streamsaw/rogers_panel/main/rogers_update.sh && chmod 777 *.sh && ./update.sh && rm *.sh

Start Panel /home/mini_cs/start.sh \
Port 19001 will listen to nginx (Admin Panel) and 18000 will listen nginx_hls \
Access your panel at http://SERVER_IP:19001 \


