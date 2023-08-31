import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { RouterModule } from '@angular/router';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { ToastrModule } from 'ngx-toastr';

import { AppRoutingModule } from './app.routing';
import { ComponentsModule } from './components/components.module';

import { AppComponent } from './app.component';

import { AdminLayoutComponent } from './layouts/admin-layout/admin-layout.component';
import { PacientesComponent } from './Pages/pacientes/pacientes.component';
import { EstadocivilComponent } from './Pages/estadocivil/estadocivil.component';
import { TiposangreComponent } from './Pages/tiposangre/tiposangre.component';
import { NuevopacienteComponent } from './Pages/pacientes/nuevopaciente/nuevopaciente.component';
import { AlumnosComponent } from './Pages/alumnos/alumnos.component';

@NgModule({
  imports: [
    BrowserAnimationsModule,
    FormsModule,
    HttpClientModule,
    ComponentsModule,
    RouterModule,
    AppRoutingModule,
    NgbModule,
    ToastrModule.forRoot(), ReactiveFormsModule
  ],
  declarations: [
    AppComponent,
    AdminLayoutComponent,
    PacientesComponent,
    EstadocivilComponent,
    TiposangreComponent,
    NuevopacienteComponent,
    AlumnosComponent

  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
