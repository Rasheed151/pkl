@extends('layouts.app')
@section('content')
  <!-- Main Content -->
  <main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1 bg-white shadow-lg rounded-lg overflow-hidden mx-auto mt-10">

      <!-- Profile Sampul -->
      <div class="relative">
        <img id="backgroundImage" src="https://via.placeholder.com/1200x400" alt="Background Image"
          class="w-full h-64 object-cover">
        <input type="file" id="backgroundInput" class="hidden" accept="image/*" onchange="changeBackground(event)">
        <button onclick="document.getElementById('backgroundInput').click()"
          class="absolute top-2 right-2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-200 focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15.232 5.232l3.536 3.536M9 11l-6 6V9h11l6 6v-3M7 17l-4 4M19 13l4 4M13 19h8" />
          </svg>
        </button>
      </div>
      <!-- End | Profile Sampul -->

      <!-- Profile Foto -->
      <div class="relative -mt-16 text-center">
        <img id="profileImage" src="img/profile.png" alt="Profile Image"
          class="mx-auto w-32 h-32 rounded-full border-4 border-white shadow-lg">
        <input type="file" id="profileInput" class="hidden" accept="image/*" onchange="changeProfile(event)">
        <button onclick="document.getElementById('profileInput').click()"
          class="absolute left-1/2 transform -translate-x-1/2 -translate-y-10 bg-white p-2 rounded-full shadow-lg hover:bg-gray-200 focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15.232 5.232l3.536 3.536M9 11l-6 6V9h11l6 6v-3M7 17l-4 4M19 13l4 4M13 19h8" />
          </svg>
        </button>
      </div>
      <!-- End | Profile Foto -->

      <!-- Profile Deskripsi -->
       @foreach ($data_desa as $desa)
       
       @endforeach
      <div class="text-center p-6">
        <h2 id="userName" class="text-2xl font-bold">{{$desa->desa}}</h2>
        <p id="userDescription" class="text-gray-600 mt-2" style="margin-bottom: 10px;">Selamat Datang Desa {{$desa -> desa}}</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal"
          style="transition: 0.5s;">
          Edit Profile
        </button>
      </div>
      <!-- End | Profile Deskripsi -->

      <!-- Data Profile  -->
      <div class="overflow-x-auto">
    @forelse ($data_desa as $data)
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Informasi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Nama Desa</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->desa}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Kecamatan</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->kecamatan}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Kabupaten</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->kabupaten}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Provinsi</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->provinsi}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Kode Desa</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->kode_desa}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Alamat Kantor Desa</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->alamat_kantor}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Email</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->email}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">NPWP Desa</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->npwp}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Nomor & Tahun Perbup Tentang PBJ</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->no_tahun_perpub_pjb}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Tanggal Perbup Tentang PBJ</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->tanggal_perpub_pjb}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">No. Keputusan Kades tentang DPA</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->no_pengesahan_dpa}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Tanggal Keputusan Kades DPA</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->tanggal_pengesahan_dpa}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Nama Kepala Desa</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->nama_kades}}</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Tahun Anggaran</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->tahun_anggaran}}</td>
                </tr>
            </tbody>
        </table>
    @empty
        <div class="text-center p-6">
            <h2 class="text-2xl font-bold">Tidak ada data desa</h2>
            <p class="text-gray-600 mt-2" style="margin-bottom: 10px;">Segera tambahkan profil</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVillageModal"
                    style="transition: 0.5s;">
               Masukkan Data
            </button>
        </div>
    @endforelse
</div>
      <!-- End | Data Profile -->

      <!-- Modal Edit Profile -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form Edit Profile -->
        <form action="{{ route('home.update', $data->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="desa" class="form-label">Nama Desa</label>
            <input type="text" class="form-control" id="desa" name="desa" value="{{ $data->desa }}" required>
          </div>
          <div class="mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $data->kecamatan }}" required>
          </div>
          <div class="mb-3">
            <label for="kabupaten" class="form-label">Kabupaten</label>
            <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ $data->kabupaten }}" required>
          </div>
          <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $data->provinsi }}" required>
          </div>
          <div class="mb-3">
            <label for="kode_desa" class="form-label">Kode Desa</label>
            <input type="text" class="form-control" id="kode_desa" name="kode_desa" value="{{ $data->kode_desa }}" required>
          </div>
          <div class="mb-3">
            <label for="alamat_kantor" class="form-label">Alamat Kantor</label>
            <input type="text" class="form-control" id="alamat_kantor" name="alamat_kantor" value="{{ $data->alamat_kantor }}" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" required>
          </div>
          <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control" id="npwp" name="npwp" value="{{ $data->npwp }}" required>
          </div>
          <div class="mb-3">
            <label for="no_tahun_perpub_pjb" class="form-label">Nomor & Tahun Perbup Tentang PBJ</label>
            <input type="text" class="form-control" id="no_tahun_perpub_pjb" name="no_tahun_perpub_pjb" value="{{ $data->no_tahun_perpub_pjb }}" required>
          </div>
          <div class="mb-3">
            <label for="tanggal_perpub_pjb" class="form-label">Tanggal Perbup Tentang PBJ</label> 
            <input type="date" class="form-control" id="tanggal_perpub_pjb" name="tanggal_perpub_pjb" value="{{ $data->tanggal_perpub_pjb }}" required>
          </div>
          <div class="mb-3">
            <label for="no_pengesahan_dpa" class="form-label">No. Keputusan Kades tentang DPA</label>
            <input type="text" class="form-control" id="no_pengesahan_dpa" name="no_pengesahan_dpa" value="{{ $data->no_pengesahan_dpa }}" required>
          </div>
          <div class="mb-3">
            <label for="tanggal_pengesahan_dpa" class="form-label">Tanggal Keputusan Kades DPA</label>
            <input type="date" class="form-control" id="tanggal_pengesahan_dpa" name="tanggal_pengesahan_dpa" value="{{ $data->tanggal_pengesahan_dpa }}" required>
          </div>
          <div class="mb-3">
            <label for="nama_kades" class="form-label">Nama Kepala Desa</label>
            <input type="text" class="form-control" id="nama_kades" name="nama_kades" value="{{ $data->nama_kades }}" required>
          </div>
          <div class="mb-3">
            <label for="tahun_anggaran" class="form-label">Tahun Anggaran</label>
            <input type="text" class="form-control" id="tahun_anggaran" name="tahun_anggaran" value="{{ $data->tahun_anggaran }}" required>
          </div>
          <div class="mb-3">

          <!-- Add other fields as necessary -->
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Edit Profile -->


@endsection