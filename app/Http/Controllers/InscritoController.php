<?php

namespace App\Http\Controllers;

use App\DataTables\InscritoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInscritoRequest;
use App\Http\Requests\UpdateInscritoRequest;
use App\Repositories\InscritoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use \App\Models\PagSeguroModel as PagSeguroModel;

class InscritoController extends AppBaseController
{
    /** @var  InscritoRepository */
    private $inscritoRepository;

    public function __construct(InscritoRepository $inscritoRepo)
    {
        $this->inscritoRepository = $inscritoRepo;
    }

    /**
     * Display a listing of the Inscrito.
     *
     * @param InscritoDataTable $inscritoDataTable
     * @return Response
     */
    public function index(InscritoDataTable $inscritoDataTable)
    {
        return $inscritoDataTable->render('inscritos.index');
    }

    /**
     * Show the form for creating a new Inscrito.
     *
     * @return Response
     */
    public function create()
    {
        return view('inscritos.create');
    }

    /**
     * Store a newly created Inscrito in storage.
     *
     * @param CreateInscritoRequest $request
     *
     * @return Response
     */
    public function store(CreateInscritoRequest $request)
    {
        $input = $request->all();

        $inscrito = $this->inscritoRepository->create($input);

        Flash::success('Inscrito saved successfully.');

        return redirect(route('inscritos.index'));
    }

    /**
     * Display the specified Inscrito.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inscrito = $this->inscritoRepository->findWithoutFail($id);

        if (empty($inscrito)) {
            Flash::error('Inscrito not found');

            return redirect(route('inscritos.index'));
        }

        return view('inscritos.show')->with('inscrito', $inscrito);
    }

    /**
     * Show the form for editing the specified Inscrito.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inscrito = $this->inscritoRepository->findWithoutFail($id);

        if (empty($inscrito)) {
            Flash::error('Inscrito not found');

            return redirect(route('inscritos.index'));
        }

        return view('inscritos.edit')->with('inscrito', $inscrito);
    }

    /**
     * Update the specified Inscrito in storage.
     *
     * @param  int              $id
     * @param UpdateInscritoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInscritoRequest $request)
    {
        $inscrito = $this->inscritoRepository->findWithoutFail($id);

        if (empty($inscrito)) {
            Flash::error('Inscrito not found');

            return redirect(route('inscritos.index'));
        }

        $inscrito = $this->inscritoRepository->update($request->all(), $id);

        Flash::success('Inscrito updated successfully.');

        return redirect(route('inscritos.index'));
    }

    /**
     * Remove the specified Inscrito from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inscrito = $this->inscritoRepository->findWithoutFail($id);

        if (empty($inscrito)) {
            Flash::error('Inscrito not found');

            return redirect(route('inscritos.index'));
        }

        $this->inscritoRepository->delete($id);

        Flash::success('Inscrito deleted successfully.');

        return redirect(route('inscritos.index'));
    }

    /**
     * Salva um Inscrito e Redireciona para PagSeguro
     *
     * @param CreateInscritoRequest $request
     *
     * @return Response
     */
    public function inscricao(CreateInscritoRequest $request)
    {
        $input = $request->all();

        $inscrito = $this->inscritoRepository->create($input);

        dd($inscrito);

        $pagSeguro = PagSeguroModel::confirmaPagamento($inscrito);

        return redirect($pagSeguro);
    }
}
