import React, { useState, useEffect } from 'react';
import Swal from 'sweetalert2';
import { useNavigate } from 'react-router-dom';
import api from '../api/axios'; 

const Dashboard = () => {
  const navigate = useNavigate();
  const [skpds, setSkpds] = useState([]);
  const [periode, setPeriode] = useState([]);
  const [statusUsulan, setStatusUsulan] = useState([]);
  const [formData, setFormData] = useState({
    nama_usulan: '',
    tahun: '',
    kode_wilayah: '',
    skpd_id: '',
    periode_id: '',
    status_usulan_id: '',
  });

  const handleLogout = () => {
    localStorage.removeItem('token');
    Swal.fire('Keluar', 'Anda telah logout', 'info');
    navigate('/');
  };

  useEffect(() => {
    api.get('/skpds').then(res => setSkpds(res.data));
    api.get('/periodes').then(res => setPeriode(res.data));
    api.get('/status-usulan').then(res => setStatusUsulan(res.data));
  }, []);

  const handleChange = e => {
    setFormData(prev => ({ ...prev, [e.target.name]: e.target.value }));
  };

  const handleSubmit = async e => {
    e.preventDefault();
    try {
      await api.post('/api/usulan', formData);
      Swal.fire('Berhasil', 'Usulan berhasil ditambahkan', 'success');
      setFormData({
        nama_usulan: '',
        tahun: '',
        kode_wilayah: '',
        skpd_id: '',
        periode_id: '',
        status_usulan_id: '',
      });
    } catch (error) {
      Swal.fire('Gagal', error.response?.data?.message || 'Terjadi kesalahan', 'error');
    }
  };

  return (
    <div className="container mt-5">
      <div className="d-flex justify-content-between align-items-center mb-4">
        <h3>Dashboard</h3>
        <button className="btn btn-danger" onClick={handleLogout}>Logout</button>
      </div>
      <p>Selamat datang di halaman dashboard! 🎉</p>

      <h4>Form Input Usulan</h4>
      <form onSubmit={handleSubmit}>
        <div className="mb-3">
          <label className="form-label">Nama Usulan</label>
          <input
            type="text"
            className="form-control"
            name="nama_usulan"
            value={formData.nama_usulan}
            onChange={handleChange}
            required
          />
        </div>
        <div className="mb-3">
          <label className="form-label">Tahun</label>
          <input
            type="number"
            className="form-control"
            name="tahun"
            value={formData.tahun}
            onChange={handleChange}
            required
          />
        </div>
        <div className="mb-3">
          <label className="form-label">Kode Wilayah</label>
          <input
            type="text"
            className="form-control"
            name="kode_wilayah"
            value={formData.kode_wilayah}
            onChange={handleChange}
            required
          />
        </div>
        <div className="mb-3">
          <label className="form-label">SKPD</label>
          <select
            className="form-select"
            name="skpd_id"
            value={formData.skpd_id}
            onChange={handleChange}
            required
          >
            <option value="">Pilih SKPD</option>
            {skpds.map(s => (
              <option key={s.id} value={s.id}>{s.nama}</option>
            ))}
          </select>
        </div>
        <div className="mb-3">
          <label className="form-label">Periode</label>
          <select
            className="form-select"
            name="periode_id"
            value={formData.periode_id}
            onChange={handleChange}
            required
          >
            <option value="">Pilih Periode</option>
            {periode.map(p => (
              <option key={p.id} value={p.id}>{p.tahun}</option>
            ))}
          </select>
        </div>
        <div className="mb-3">
          <label className="form-label">Status Usulan</label>
          <select
            className="form-select"
            name="status_usulan_id"
            value={formData.status_usulan_id}
            onChange={handleChange}
            required
          >
            <option value="">Pilih Status</option>
            {statusUsulan.map(s => (
              <option key={s.id} value={s.id}>{s.nama_status}</option>
            ))}
          </select>
        </div>
        <button type="submit" className="btn btn-primary">Simpan Usulan</button>
      </form>
    </div>
  );
};

export default Dashboard;
