<?php

namespace App\Controllers;

class AdminControl extends BaseController
{

    public function showAdminAuth()
    {
        if ($this->session->get('adminLogged')) {
            return redirect()->to(base_url('/admin'));
        }

        $this->renderGlobalView('admin/auth', []);
    }

    public function validateAdminSignin()
    {
        if (!$this->validate([
            "password" => [
                "label" => "Password",
                "rules" => "trim|required",
            ]
        ])) {
            $response = ['type' => 0, 'msg' => $this->validator->listErrors(),];
        } else {
            if ($this->adm->where('password', $this->request->getVar('password'))->first()) {
                $this->session->set(['adminLogged' => TRUE]);
                $response = ['type' => 1, 'url' => base_url('admin')];
            } else {
                $response = ['type' => 0, 'msg' => 'Wrong password entered.'];
            }
        }
        return $this->response->setJSON($response);
    }

    public function viewDashboard()
    {
        $data = [
            'centerData' => $this->ctr->findAll(),
        ];

        $this->renderGlobalView('admin/dashboard', $data);
    }

    public function addWashingCenter()
    {
        if (!$this->validate([
            "center_name" => [
                "label" => "Center Name",
                "rules" => "required|alpha_space"
            ],
            "center_address" => [
                "label" => "Center Address",
                "rules" => "required"
            ],
            "phone_no" => [
                "label" => "Center Phone No",
                "rules" => "required|is_natural|exact_length[10]"
            ],
            "washing_price" => [
                "label" => "Washing Price",
                "rules" => "required|numeric"
            ],
            "workers_name" => [
                "label" => "Center Workers",
                "rules" => "required"
            ],
        ])) {
            $response = ['type' => 0, 'msg' => $this->validator->listErrors(),];
        } else {
            $data = [
                'center_name' => $this->request->getVar('center_name'),
                'center_address' => $this->request->getVar('center_address'),
                'phone_no' => $this->request->getVar('phone_no'),
                'washing_price' => $this->request->getVar('washing_price'),
                'workers_name' => implode(',', $this->request->getVar('workers_name')),
            ];

            $this->ctr->save($data);
            $response = ['type' => 1, 'msg' => 'Washing center added successfully.'];
        }

        return $this->response->setJSON($response);
    }

    public function viewUpdateWashingCenter()
    {
        return $this->response->setJSON($this->ctr->where('cid', $this->request->getVar('cid'))->first());
    }

    public function updateWashingCenter()
    {
        if (!$this->validate([
            "center_name" => [
                "label" => "Center Name",
                "rules" => "required|alpha_space"
            ],
            "center_address" => [
                "label" => "Center Address",
                "rules" => "required"
            ],
            "phone_no" => [
                "label" => "Center Phone No",
                "rules" => "required|is_natural|exact_length[10]"
            ],
            "washing_price" => [
                "label" => "Washing Price",
                "rules" => "required|numeric"
            ],
            "workers_name" => [
                "label" => "Center Workers",
                "rules" => "permit_empty"
            ],
        ])) {
            $response = ['type' => 0, 'msg' => $this->validator->listErrors(),];
        } else {
            $data = [
                'center_name' => $this->request->getVar('center_name'),
                'center_address' => $this->request->getVar('center_address'),
                'phone_no' => $this->request->getVar('phone_no'),
                'washing_price' => $this->request->getVar('washing_price'),
            ];

            if ($this->request->getVar('workers_name')) {
                $data += [
                    'workers_name' => implode(',', $this->request->getVar('workers_name')),
                ];
            }

            $this->ctr->update($this->request->getVar('cid'), $data);
            $response = ['type' => 1, 'msg' => 'Washing center updated successfully.'];
        }

        return $this->response->setJSON($response);
    }

    public function deleteWashingCenter()
    {
        $this->ctr->delete($this->request->getVar('cid'));

        $response = ['type' => 1, 'msg' => 'Washing center deleted successfully.'];
        return $this->response->setJSON($response);
    }

    public function logout()
    {
        $this->session->remove(['adminLogged']);
        return redirect()->to(base_url('admin/auth/'));
    }
}
