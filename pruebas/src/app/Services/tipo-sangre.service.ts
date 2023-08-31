import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.prod';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

const url = environment.url + 'Autores.controllers.php?op=';

@Injectable({
  providedIn: 'root'
})
export class TipoSangreService {

  constructor(private http:HttpClient) { }

  todos():Observable<any[]>{
    return this.http.get<any[]>(url + 'todos');
  }
}
