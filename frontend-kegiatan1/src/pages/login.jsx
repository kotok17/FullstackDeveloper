// src/pages/Login.jsx
import React, { useState } from 'react';
import Swal from 'sweetalert2';
import { useNavigate } from 'react-router-dom';
import axios from 'axios';

const Login = () => {
  const navigate = useNavigate();
  const [form, setForm] = useState({ email: '', password: '' });

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleLogin = async (e) => {
    e.preventDefault();
    try {
      const res = await axios.post('http://localhost:8000/api/login', form);
      localStorage.setItem('token', res.data.token);
      Swal.fire('Sukses', 'Login berhasil', 'success');
      navigate('/dashboard');
    } catch (err) {
      Swal.fire('Gagal', 'Login gagal.<br> Periksa kembali email atau password.', 'error');
    }
  };

  return (
    <div className="container mt-5">
      <h2 className="text-center mb-4">Login</h2>
      <div style={{display: 'flex', justifyContent:'center', alignContent:'center', height: '100px', marginBottom: '20px'}}>
      <img src="/logodki.png" alt="" />
      </div>
      <p className='text-center mb-4'>Masuk kedalam aplikasi untuk mengakses</p>
      <form onSubmit={handleLogin} className="card p-4 col-md-6 mx-auto shadow">
        <div className="mb-3">
          <label>Email</label>
          <input type="email" name="email" className="form-control" onChange={handleChange} required />
        </div>
        <div className="mb-3">
          <label>Password</label>
          <input type="password" name="password" className="form-control" onChange={handleChange} required />
        </div>
        <button className="btn btn-primary w-100" type="submit">Login</button>
      
        <p className="text-center mt-3">
          Belum punya akun? <a href="/register">Daftar disini</a>
        </p>
      </form>
    </div>
  );
};

export default Login;
