import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TiposangreComponent } from './tiposangre.component';

describe('TiposangreComponent', () => {
  let component: TiposangreComponent;
  let fixture: ComponentFixture<TiposangreComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TiposangreComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(TiposangreComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
