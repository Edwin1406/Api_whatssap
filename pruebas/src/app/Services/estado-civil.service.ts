import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.prod';
import { Observable } from 'rxjs';

const url = environment.url + "Autores.controllers.php?op=";

@Injectable({
  providedIn: 'root'
})
export class EstadoCivilService {

  constructor(private http:HttpClient) { }

  todos():Observable<any[]>{
    return this.http.get<any[]>(url + 'todos');
  }

}
