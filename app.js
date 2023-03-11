const express = require('express');
const cors = require('cors');
const app = express();
const users = require('./routes/usersRoute');

app.use(cors())
app.use(express.json())

app.use('/user', users)


module.exports = app;