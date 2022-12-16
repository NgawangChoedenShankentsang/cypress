# Install node (if required)
```bash
cd ~
curl -sL https://deb.nodesource.com/setup_18.x -o nodesource_setup.sh
sudo bash nodesource_setup.sh
sudo apt install nodejs
```

# GETTING STARTED
1. clone the repo
2. run `docker-compose up`
3. `cd cypress` 
4. `yarn run cypress open`




# Welcome to UK ???

```bash
# connect to db
mariadb -h 127.0.0.1 -u root -P 3306 -p -D shop
```

## Getting started
### Node.js 14

Make sure you have node 14 installed. Please do not install any other version. If you are bored you can try 16 and 18 but 18 is fairly new and many things don't support 18 yet.


#### How to install Node.js 14

```bash
sudo apt update
```
```bash
curl -sL https://deb.nodesource.com/setup_14.x | sudo bash -
```
```bash
sudo apt -y install nodejs
```
Then check if you have installed the right version of node:
```bash
node -v
```
should output v14.??.??

### Docker
Docker is a container solution. It makes deploying server images extremely easy.

#### How to install docker
Run the following commands:
```bash
sudo apt update
```
```bash
sudo apt install apt-transport-https ca-certificates curl software-properties-common
```
```bash
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
```
```bash
echo "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
```
```bash
sudo apt update
```
```bash
apt-cache policy docker-ce
```
```bash
sudo apt install docker-ce
```
```bash
sudo systemctl status docker
```
```bash
sudo usermod -aG docker ${USER}
```
```bash
su - ${USER}
```
Please enter the password for your ubuntu user
```bash
groups
```
Should show
```bash
YOUR_USERNAME sudo docker
```


### Docker-compose
Docker-compose is a separate program which makes building docker containers easy.

#### How to install docker-compose
Run the following commands:

```bash
mkdir -p ~/.docker/cli-plugins/
```
```bash
curl -SL https://github.com/docker/compose/releases/download/v2.3.3/docker-compose-linux-x86_64 -o ~/.docker/cli-plugins/docker-compose
```
```bash
chmod +x ~/.docker/cli-plugins/docker-compose
```
Verify that the installation was successful:
```bash
docker compose version
```
You should see something like this:
```bash
Docker Compose version v2.3.3
```

## Starting cypress
To start cypress you need to move into the cypress folder and start cypress:
```bash
cd cypress
```
When you do this for the first time you will need to install the dependencies by running:
```bash
yarn
```
Then start cypress:
```bash
yarn run cypress open
```
