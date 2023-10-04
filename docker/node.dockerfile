FROM node:lts-alpine as build-stage

WORKDIR /app

COPY package.json ./
COPY package-lock.json* ./

RUN npm install

COPY . .

CMD ["npm", "run", "dev"]
