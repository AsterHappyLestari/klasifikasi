namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class EmptyExportWithHeader implements FromView
{
    public function view(): View
    {
        return view('import.excel_empty');
    }
}
