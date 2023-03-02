@include('../template/header');
@include('../template/sidebar');
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-home"></i>
                home
              </h3>
            <div class="card-tools">
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">1. Jika diperlukan waktu 9 menit untuk merebus satu telur dalam 1 panci, berapa waktu yang
diperlukan untuk merebus empat telur dalam 1 panci?<br> 
Jawaban : <br>
Jika diperlukan waktu 9 menit untuk merebus satu telur dalam 1 panci, maka waktu yang dibutuhkan untuk merebus empat telur dalam 1 panci adalah 9 menit juga. Karena 9 telur yang direbus secara bersamaan sehingga tidak mempengaruhi waktu yang dibutuhkan untuk merebus satu telur maupun 9 telur. <br> <br>

2. Diketahui Berat anjing + kucing + tikus Adalah 31kg, sedangkan berat kucing + tikus adalah 11kg,
kemudian berat anjing + tikus adalah 23kg, berapakah berat masing - masing?<br>
Jawaban : <br>
Berat kucing 8 kg, berat tikus 3 kg, berat anjing 20kg<br><br>

3. Ayu, Budi dan Cinta merupakan kakak beradik. Budi 3 tahun diatas Cinta, sedangkan Ayu 4 tahun
dibawah Cinta. Umur Ayah dapat diketahui dengan menambahkan semua umur anaknya.
Sedangkan Ibu berumur 4 kali lebih besar dari Ayu, setelah itu ditambah 5. Berapakah umur
Cinta, Budi, Ayah dan Ibu, jika Ayu berumur 10 tahun?<br>
Jawaban : <br>
Ayu berumur 10 tahun, sehingga Budi berumur 17 tahun dan Cinta berumur 14 tahun. Ayah berumur 10 + 14 + 17 = 41 tahun. Ibu berumur 4 x 10 + 5 = 45 tahun.<br><br>

4. Buatlah sebuah fungsi dalam bahasa pemrograman tertentu, dan tuliskan bahasa pemrograman
tsb untuk ( tidak boleh menggunakan fungsi jadi seperti reverse,dll ) :<br>
a. Membalik kata - kata (contoh : inputan => “Indonesia” | output => “aisenodnI”)<br>
b. Faktorial (Contoh : inputan => 4 | output => 4x3x2x1 = 24)<br>
c. Menghitung jumlah kata dalam kalimat (contoh : inputan => “Tanah Air Indonesia” |
output => 3)<br>
d. Menghitung huruf Kapital(contoh : inputan => “IndonesIA Timur” | output => I=2, A=1,
T=1 )<br>Jawaban : <br>
Berikut adalah contoh fungsi dalam bahasa Python untuk setiap pertanyaan:
<br>
a. Membalik kata-kata<br>

python
def reverse_string(s):
    result = ""
    for i in range(len(s)-1, -1, -1):
        result += s[i]
    return result
<br>
# Contoh penggunaan<br>
print(reverse_string("Indonesia")) # Output: aisenodnI<br><br>
b. Faktorial<br>

python<br>
def factorial(n):
    result = 1
    for i in range(1, n+1):
        result *= i
    return result
<br>
# Contoh penggunaan<br>
print(factorial(4)) # Output: 24<br><br>
c. Menghitung jumlah kata dalam kalimat<br>

python<br>
def count_words(s):
    words = s.split()
    return len(words)<br>

# Contoh penggunaan<br>
print(count_words("Tanah Air Indonesia")) # Output: 3<br><br>
d. Menghitung huruf Kapital

sql<br>
def count_capital_letters(s):
    result = {}
    for c in s:
        if c.isupper():
            if c in result:
                result[c] += 1
            else:
                result[c] = 1
    return result<br>

# Contoh penggunaan<br>
print(count_capital_letters("IndonesIA Timur")) # Output: {'I': 2, 'A': 1, 'T': 1}<br>
          </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('../template/footer');