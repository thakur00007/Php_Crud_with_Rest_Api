const express = require('express');

const router = express.Router();

const userController = require('../controllers/userController');

// get user
router.get('/', userController.getUsers)

module.exports = router;