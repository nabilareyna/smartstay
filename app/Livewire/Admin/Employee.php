<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Hotel;
use App\Models\Employees;

class Employee extends Component
{
    public $hotel_id, $nama, $email, $no_telepon, $jabatan, $departemen, $status = 'aktif';
    public $employees, $employeeId;
    public $isEdit = false;

    protected $rules = [
        'hotel_id' => 'required|numeric|exists:hotels,id',
        'nama' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'no_telepon' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'departemen' => 'required|string|max:255',
        'status' => 'nullable|string|max:255',
    ];

    public function mount()
    {
        $this->loadEmployees();
    }

    public function loadEmployees()
    {
        $this->employees = Employees::all();
    }

    public function edit($id)
    {
        $employee = Employees::findOrFail($id);
        if (!$employee) {
            session()->flash('error', 'Karyawan tidak ditemukan.');
            return;
        }

        $this->employeeId = $employee->id;
        $this->hotel_id = $employee->hotel_id;
        $this->nama = $employee->nama;
        $this->email = $employee->email;
        $this->no_telepon = $employee->no_telepon;
        $this->jabatan = $employee->jabatan;
        $this->departemen = $employee->departemen;
        $this->status = $employee->status;
        $this->isEdit = true;
    }

    public function delete($id)
    {
        Employees::destroy($id);
        session()->flash('success', 'Data karyawan berhasil dihapus.');
        $this->loadEmployees();
        $this->emit('refreshEmployees');
    }

    public function resetForm()
    {
        $this->reset(['hotel_id', 'nama', 'email', 'no_telepon', 'jabatan', 'departemen', 'status', 'employeeId', 'isEdit']);
    }


    public function getHotelNameProperty()
    {
        return Hotel::find($this->hotel_id)?->nama_hotel ?? '-';
    }

    public function save()
    {
        $employee = $this->employeeId ? Employees::find($this->employeeId) : null;

        if ($this->email !== null) {
            $rules['email'] = 'required|email|unique:employees,email';
            if ($this->employeeId) {
                // Tambahkan pengecualian ID saat update
                $rules['email'] = 'required|email|unique:employees,email,' . $this->employeeId;
            }
        }

        $this->validate();

        if ($this->employeeId && $employee) {
            $employee->update([
                'hotel_id' => $this->hotel_id,
                'nama' => $this->nama,
                'email' => $this->email ?? $employee->email,
                'no_telepon' => $this->no_telepon,
                'jabatan' => $this->jabatan,
                'departemen' => $this->departemen,
                'status' => $this->status,
            ]);
            session()->flash('message', 'Data karyawan berhasil diperbarui.');
        } else {
            Employees::create([
                'hotel_id' => $this->hotel_id,
                'nama' => $this->nama,
                'email' => $this->email,
                'no_telepon' => $this->no_telepon,
                'jabatan' => $this->jabatan,
                'departemen' => $this->departemen,
                'status' => $this->status ?? 'aktif',
            ]);

            session()->flash('success', 'Data karyawan berhasil disimpan.');
        }

        $this->reset(['hotel_id', 'nama', 'email', 'no_telepon', 'jabatan', 'departemen', 'status']);

        $this->emit('refreshEmployees');
    }

    protected $listeners = ['refreshEmployees' => 'loadEmployees'];

    public function render()
    {
        return view('livewire.admin.employee', data: [
            'hotels' => Hotel::all()
        ]);
    }
}
