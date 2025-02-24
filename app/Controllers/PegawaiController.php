<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Config\App;

class PegawaiController extends ResourceController
{
    protected $modelName = 'App\Models\Pegawai';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data = [
            "message" => "success",
            "data_pegawai" => $this->model->orderBy('id','DESC')->findAll()
        ];
        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $rules = $this->validate([
            'nama' => 'required|is_unique[pegawai.nama]',
            'jabatan' => 'required',
            'bidang' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        if(!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $this->model->insert([
            'nama' => esc($this->request->getVar('nama')),
            'jabatan' => esc($this->request->getVar('jabatan')),
            'bidang' => esc($this->request->getVar('bidang')),
            'alamat' => esc($this->request->getVar('alamat')),
            'email' => esc($this->request->getVar('email'))
        ]);

        $response = [
            "message" => "data pegawai berhasil ditambahkan"
        ];

        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $rules = $this->validate([
            'nama' => 'required|is_unique[pegawai.nama]',
            'jabatan' => 'required',
            'bidang' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        if(!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $this->model->update($id, [
            'nama' => esc($this->request->getVar('nama')),
            'jabatan' => esc($this->request->getVar('jabatan')),
            'bidang' => esc($this->request->getVar('bidang')),
            'alamat' => esc($this->request->getVar('alamat')),
            'email' => esc($this->request->getVar('email'))
        ]);

        $response = [
            "message" => "data pegawai berhasil diubah"
        ];

        return $this->respond($response, 200);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $this->model->delete($id);

        $response = [
            "message" => "data pegawai berhasil dihapus"
        ];

        return $this->respondDeleted($response);
    }
}
