const exp = require('express');
const apiRutas=require('./routes/rutas.routes');

const app = exp ();
const PUERTO = process.env.PORT || 4000;



app.use(exp.json());
app.use("/api/",apiRutas);

app.listen(PUERTO, () => {
    console.log("En el puerto " + PUERTO);
  });
  