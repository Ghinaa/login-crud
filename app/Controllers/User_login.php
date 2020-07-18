<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\User_model;   
      
class User_login extends Controller    
{     
    public function index()      
    {    
        $model = new User_model();     
        $data['user']  = $model->getUser()->getResult();      
        echo view('/User_views', $data);     
    }    
      
    public function saveUser()      
    {    
        $model = new User_model();     
        $data = array(     
            'userid'      => $this->request->getPost('userid'),      
            'name'       => $this->request->getPost('name'),    
            'email'          => $this->request->getPost('email'),    
            'password'       => $this->request->getPost('password'),    
        );     
        $model->saveUser($data);    
        return redirect()->to(base_url('public/User_login'));      
    }    
      
    public function updateUser()    
    {    
        $model = new User_model();     
        $id = $this->request->getPost('userid');      
         $data = array(     
            'userid'      => $this->request->getPost('userid'),      
            'name'       => $this->request->getPost('name'),    
            'email'          => $this->request->getPost('email'),    
            'password'       => $this->request->getPost('password'),    
        );    
        $model->updateUser($data, $id);      
        return redirect()->to(base_url('public/User_login'));      
    }    
      
    public function deleteUser()    
    {    
        $model = new User_model();     
        $id = $this->request->getPost('userid');      
        $model->deleteUser($id);    
        return redirect()->to(base_url('public/User_login'));      
    }    
      
}   
