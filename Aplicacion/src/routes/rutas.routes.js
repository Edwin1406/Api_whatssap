const exp = require("express");
const router = exp.Router();
const controladorwassap = require('../controllers/whatsapp.controller');

router
  .get('/', controladorwassap.verificaciontoken)
  .post('/', controladorwassap.recibirMensaje);

module.exports = router;
