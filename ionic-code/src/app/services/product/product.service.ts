import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ProductService {

  private apiUrl = 'http://your-api-url/api'; // Sesuaikan dengan URL API Anda

  constructor(private http: HttpClient) { }

  addProduct(formData: FormData) {
    return this.http.post<any>(`${this.apiUrl}/products`, formData).toPromise();
  }
}
