import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonContent, IonHeader, IonTitle, IonToolbar } from '@ionic/angular/standalone';

@Component({
  selector: 'app-delete-product',
  templateUrl: './delete-product.page.html',
  styleUrls: ['./delete-product.page.scss'],
  standalone: true,
  imports: [IonContent, IonHeader, IonTitle, IonToolbar, CommonModule, FormsModule]
})
export class DeleteProductPage implements OnInit {

  constructor() { }

  ngOnInit() {
  }

}
