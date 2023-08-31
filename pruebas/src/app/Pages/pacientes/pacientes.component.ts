import {Component, OnInit} from '@angular/core';
import {IPacientes} from '../../Interfaces/pacientes';
import {PacientesService} from '../../Services/pacientes.service';
import swal from 'sweetalert2';
@Component({selector: 'app-pacientes', templateUrl: './pacientes.component.html', styleUrls: ['./pacientes.component.scss']})
export class PacientesComponent implements OnInit {

    listapacientes : IPacientes[];
    constructor(private pacienteServicio : PacientesService) {}

    ngOnInit(): void {
       this.cargatabla();
    }
cargatabla(){
  this.pacienteServicio.todos().subscribe((lista) => {
    this.listapacientes = lista;
});
}
    eliminar(idPaciente : number) {
        swal.fire({
            title: 'Pacientes',
            text: "Esta seguro que desea elminar el paciente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.pacienteServicio.eliminar(idPaciente).subscribe((dato) => {
                    if (dato) {
                        swal.fire('Pacientes', 'Se elimino correctamente', 'success');
                        this.cargatabla();

                    }

                });


            }
        })

    }

}
