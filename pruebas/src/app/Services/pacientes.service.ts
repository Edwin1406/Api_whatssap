import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../environments/environment.prod';
import { IPacientes } from '../Interfaces/pacientes';

// primero esto 

const url = environment.url + "Libros.controllers.php?op=";
@Injectable({
  providedIn: 'root'
})
export class PacientesService {
  //despues esto 
  constructor(private http: HttpClient) { }
// lamamos al ipacientes de las intefaces 
  todos():Observable<IPacientes[]>{
    return this.http.get<IPacientes[]>(url + 'todos');
  }

  // a diferencia que aqui me va a venior el idpaciente

  uno(libro_id:number):Observable<IPacientes>{
    // tambien creamos la variable pac 
    var pac = new FormData();
    pac.append('libro_id',libro_id.toString())
    return this.http.post<IPacientes>(url + 'uno',pac);
  }

  insertar(paciente:IPacientes):Observable<string>{

    // poner tal y como esta en la base
    var pac = new FormData();
    pac.append('titulo',paciente.titulo)
    pac.append('fecha_publicacion',paciente.fecha_publicacion.toString())
    pac.append('editorial',paciente.editorial)
    pac.append('genero',paciente.genero)
    pac.append('sinopsis',paciente.sinopsis)
    // pac.append('autor_id',paciente.autor_id.toString())

    // pac.append('tipo',paciente.tipo.toString())
   
    return this.http.post<string>(url + 'insertar',pac);
  }
  actualizar(paciente:IPacientes, libro_id:number):Observable<string>{
    var pac = new FormData();
    pac.append('libro_id',libro_id.toString())
    pac.append('titulo',paciente.titulo)
    pac.append('fecha_publicacion',paciente.fecha_publicacion.toString())
    pac.append('editorial',paciente.editorial)
    pac.append('genero',paciente.genero)
    pac.append('sinopsis',paciente.sinopsis)
    pac.append('autor_id',paciente.autor_id.toString())
    // pac.append('tipo',paciente.tipo.toString())
 
    return this.http.post<string>(url + 'actualizar',pac);
  }
  eliminar(libro_id:number):Observable<string>{
    var pac = new FormData();
    pac.append('libro_id',libro_id.toString())

    // los nombres van de acuerdo al api de la conexion de la base de datos 
    return this.http.post<string>(url + 'eliminar',pac);
  }
}
