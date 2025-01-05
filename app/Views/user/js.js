<script>
        document.addEventListener('DOMContentLoaded', function () {
    // Menghitung total harga saat input quantity berubah
    document.getElementById('productTable').addEventListener('input', function (event) {
        if (event.target.classList.contains('quantity')) {
            const price = parseFloat(event.target.getAttribute('data-product-price'));
            const quantity = parseInt(event.target.value) || 0; // Default to 0 if input is invalid
            const totalPrice = price * quantity;

            // Temukan elemen `total-price` di baris yang sama dan perbarui nilainya
            event.target.closest('tr').querySelector('.total-price').textContent = new Intl.NumberFormat('id-ID').format(totalPrice);
        }
    });

    // Validasi jumlah barang (quantity)
    document.querySelectorAll('.quantity').forEach(input => {
        input.addEventListener('input', function () {
            const quantity = parseInt(this.value);
            if (isNaN(quantity) || quantity <= 0) {
                alert('Jumlah harus lebih dari 0.');
                this.value = 1; // Set default value
            }
        });
    });
});

// Fungsi untuk mendapatkan data produk dari tabel
function getProductData(row) {
    return {
        productId: row.querySelector('input[name="choose"]').getAttribute('data-product-id'),
        name: row.querySelector('td:nth-child(3)').textContent.trim(),
        price: row.querySelector('td:nth-child(4)').textContent.trim(),
        quantity: row.querySelector('.quantity').value.trim(),
        totalPrice: row.querySelector('.total-price').textContent.trim(),
    };
}

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const defaultWeight = 200; // Berat default dalam gram
        let totalPrice = 0; // Total harga awal

        // Hitung total berat berdasarkan jumlah item di keranjang
        const calculateTotalWeight = () => {
            const cartItems = document.querySelectorAll('.cart-item'); // Asumsi class .cart-item digunakan pada setiap item
            let totalWeight = 0;

            cartItems.forEach(item => {
                const quantity = parseInt(item.getAttribute('data-quantity'), 10) || 0;
                totalWeight += defaultWeight * quantity; // Berat per produk dikali jumlah
            });

            return totalWeight;
        };

        // Fetch Provinces
        fetch('<?= base_url('rajaongkir/provinces') ?>')
            .then(response => response.json())
            .then(data => {
                const provinsiDropdown = document.getElementById('provinsi');
                data.rajaongkir.results.forEach(provinsi => {
                    const option = document.createElement('option');
                    option.value = provinsi.province_id;
                    option.textContent = provinsi.province;
                    provinsiDropdown.appendChild(option);
                });
            });

        // Handle Province Change
        document.getElementById('provinsi').addEventListener('change', function () {
            const provinceId = this.value;
            const kotaDropdown = document.getElementById('kota');
            kotaDropdown.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
            kotaDropdown.disabled = true;

            if (provinceId) {
                fetch(`<?= base_url('rajaongkir/cities/') ?>${provinceId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.rajaongkir.results.forEach(kota => {
                            const option = document.createElement('option');
                            option.value = kota.city_id;
                            option.textContent = `${kota.type} ${kota.city_name}`;
                            kotaDropdown.appendChild(option);
                        });
                        kotaDropdown.disabled = false;
                    });
            }
        });

        // Handle City Selection to Fetch Ongkir
        document.getElementById('kota').addEventListener('change', function () {
            const cityId = this.value;
            const totalWeight = calculateTotalWeight(); // Ambil berat total dari keranjang

            if (cityId) {
                fetch(`<?= base_url('rajaongkir/ongkir/') ?>${cityId}/${totalWeight}`)
                    .then(response => response.json())
                    .then(data => {
                        const ongkir = data.rajaongkir.results[0].costs[0].cost[0].value;
                        document.getElementById('ongkir').value = new Intl.NumberFormat('id-ID').format(ongkir);

                        // Total harga produk harus diperbarui secara dinamis
                        const productPrices = document.querySelectorAll('.product-price');
                        totalPrice = Array.from(productPrices).reduce((sum, priceElement) => {
                            return sum + parseInt(priceElement.textContent.replace(/[^0-9]/g, ''), 10);
                        }, 0);

                        document.getElementById('totalHarga').value = new Intl.NumberFormat('id-ID').format(totalPrice + ongkir);
                    });
            }
        });
    });


    </script>



    <script>
    document.querySelector('[data-bs-toggle="offcanvas"]').addEventListener('click', function () {
        // Kosongkan daftar produk yang sudah ada
        const cartItemsList = document.getElementById('cartItemsList');
        cartItemsList.innerHTML = '';

        // Ambil semua checkbox yang dicentang
        const selectedProducts = document.querySelectorAll('input[name="choose"]:checked');

        // Jika tidak ada produk yang dicentang
        if (selectedProducts.length === 0) {
            cartItemsList.innerHTML = '<li>Tidak ada produk yang dipilih.</li>';
            return;
        }

        // Loop melalui setiap produk yang dicentang
        selectedProducts.forEach(productCheckbox => {
            // Ambil data produk
            const row = productCheckbox.closest('tr');
            const productName = row.querySelector('td:nth-child(3)').textContent;
            const productPrice = row.querySelector('td:nth-child(4)').textContent;
            const productQuantity = row.querySelector('.quantity').value;
            const productTotalPrice = row.querySelector('.total-price').textContent;

            // Buat elemen list untuk produk
            const listItem = document.createElement('li');
            listItem.textContent = `${productName} - ${productQuantity} pcs - ${productTotalPrice}`;
            
            // Tambahkan elemen list ke dalam daftar di sidebar
            cartItemsList.appendChild(listItem);
        });
    });
    </script>

    <script>

        // Fungsi untuk menampilkan sidebar
        function showCartSidebar() {
            const cartSidebar = new bootstrap.Offcanvas(document.getElementById('cartSidebar'));
            cartSidebar.show();

            // Reset list produk
            document.getElementById('cartItemsList').innerHTML = '';

            // Loop untuk menambah item yang dipilih
            document.querySelectorAll('input[name="choose"]:checked').forEach((checkbox) => {
                const row = checkbox.closest('tr');
                const productName = row.querySelector('td:nth-child(3)').textContent;
                const quantity = row.querySelector('input[name="F_quantity"]').value;
                const price = row.querySelector('td:nth-child(4)').textContent;

                const li = document.createElement('li');
                li.textContent = `${productName} - ${quantity} x ${price}`;
                document.getElementById('cartItemsList').appendChild(li);
            });
        }

        // Fungsi untuk submit data ke backend
    function submitCart() {
        const formData = new FormData();
        const selectedProducts = [];

        document.querySelectorAll('input[name="choose"]:checked').forEach(checkbox => {
            const row = checkbox.closest('tr');
            const data = getProductData(row);
            selectedProducts.push(data);

            // Tambahkan data individual ke FormData
            formData.append('productIds[]', data.productId);
            formData.append('quantities[]', data.quantity);
        });

        if (selectedProducts.length === 0) {
            alert('Silakan pilih minimal satu produk.');
            return;
        }

        // Validasi bukti transfer dan alamat
        const buktiTf = document.getElementById('buktiTf').files[0];
        if (!buktiTf) {
            alert('Silakan upload bukti transfer.');
            return;
        }
        formData.append('buktiTf', buktiTf);

        const alamatKirim = document.getElementById('alamatKirim').value.trim();
        if (!alamatKirim) {
            alert('Silakan masukkan alamat pengiriman.');
            return;
        }
        formData.append('alamatKirim', alamatKirim);

        // Debugging
        console.log('FormData:', ...formData.entries());

        // Kirim data ke server
        fetch('<?= base_url('transaction/save') ?>', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Pesanan berhasil disimpan.');
                    location.reload();
                } else {
                    console.error('Error response:', data);
                    alert('Terjadi kesalahan: ' + (data.error || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                alert('Terjadi kesalahan: ' + error);
            });
    }

    </script>