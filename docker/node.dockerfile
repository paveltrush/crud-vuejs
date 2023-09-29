FROM node:lts-alpine as build-stage
WORKDIR /var/www/html
COPY  package.json ./
RUN npm install
COPY . .
RUN npm run build
