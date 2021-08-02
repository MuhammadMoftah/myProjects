FROM node:latest

# Add Additional Packages
RUN apt-get update \
   && apt-get install -y vim net-tools

# Add Font ENV
ENV FONT_AW_TOKEN=68DCA13C-6B01-4C55-B91D-D3C65EBE8592
ENV HOST 0.0.0.0

# install simple http server for serving static content
RUN npm install -g http-server

# make the 'app' folder the current working directory
WORKDIR /app

# copy both 'package.json' and 'package-lock.json' (if available)
COPY package*.json ./

# Add Conig Set
RUN npm config set '@fortawesome:registry' https://npm.fontawesome.com \
   && npm config set '//npm.fontawesome.com/:_authToken' ${FONT_AW_TOKEN}

# install project dependencies
RUN yarn 

# copy project files and folders to the current working directory (i.e. 'app' folder)
COPY . .

RUN npm i friendly-errors-webpack-plugin@npm:@soda/friendly-errors-webpack-plugin

# Build project dependencies
RUN yarn build 

EXPOSE 3000

CMD [ "yarn", "start" ]
