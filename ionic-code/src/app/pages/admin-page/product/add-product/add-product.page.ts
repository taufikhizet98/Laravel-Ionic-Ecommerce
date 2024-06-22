import { Component } from '@angular/core';
import { ToastController } from '@ionic/angular';
import { ProductService } from 'src/app/services/product/product.service';

@Component({
  selector: 'app-add-product',
  templateUrl: './add-product.page.html',
  styleUrls: ['./add-product.page.scss'],
})
export class AddProductPage {

  product = {
    name: '',
    price: null,
    status: '',
    description: '',
    cover: null
  };

  constructor(private productService: ProductService, private toastController: ToastController) { }

  async onSubmit() {
    // const formData = new FormData();
    // formData.append('name', this.product.name);
    // formData.append('price', this.product.price.toString());
    // formData.append('status', this.product.status);
    // formData.append('description', this.product.description);
    // formData.append('cover', this.product.cover);

    // try {
    //   const response = await this.productService.addProduct(formData);
    //   this.presentToast('Product added successfully');
    // } catch (error) {
    //   console.error('Error adding product:', error);
    //   this.presentToast('Failed to add product');
    // }
  }

  // onFileChange(event) {
  //   if (event.target.files.length > 0) {
  //     const file = event.target.files[0];
  //     this.product.cover = file;
  //   }
  // }

  async presentToast(message: string) {
    const toast = await this.toastController.create({
      message: message,
      duration: 2000
    });
    toast.present();
  }
}
