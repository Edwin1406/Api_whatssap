const verificaciontoken = (req, res) => {
    res.send("verificacion de token");
  };
  
  const recibirMensaje = (req, res) => {
    res.send("Mensaje recibido");
  };
  
  module.exports = { verificaciontoken, recibirMensaje };
  
