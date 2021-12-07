<?php

/*
 * ['title'=>'something',
 * 'id'=>'',
 * 'content'=> [
 *      'form'=> ['method'=>'post', 'action'=>'',
 *           'inputs'=> [
 *               0=>['type'=>'label', 'for'=>'...', 'placeholder'=>'Naam'],
 *               1=>['type'=>text, 'id'=>'...', 'name'=>'Name', 'value'=>'', 'placeholder'=>'....', 'required'=>1],
 *            ]
 *      ],
 *      'cardVertical'=> ['img'=>'location', 'title'=>'mountain', 'content'=>'kekw', 'tags'=>[]],
 *      'cardHorizontal'=> ['img'=>'location', 'title'=>'mountain', 'content'=>'kekw', 'tags'=>[]],
 *      'alert'=>['type'=>'succes', 'title'=>'error', 'description'],
 *      'info'=> ['content'=>['column'=>'', 'content'=>''],],
 * ],
 * 'closeButton'=>['type'=>'submit', 'name'=>'', 'placeholder'=> '', 'ariaLabel'=>'']
 * ]
 * */

class grids
{

    /**
     * @param array $header_array
     * @param array $body_array
     * @param array $action_array
     * @return string
     * Sticks different grid functions together
     */
    public function createTable(array $header_array = [], array $body_array = [], array $action_array = []): string
    {
        return '<table id="table" class="leading-normal min-w-full table-auto overflow-auto max-h-screen display dataTable">' . $this->tableHeader($header_array) . $this->tableBody($body_array, $action_array) . '</table>';
    }

    /*array() $header_array: Pass an array containing the columns the table should exist of
            Example data: ['id'=>'id', 'name'=>'Naam', 'created_at'=>'datum]
    */
    private function tableHeader(array $header_array): string
    {
        $tableHeader = ' <thead><tr>';
        if (!empty($header_array)) {
            foreach ($header_array as $nickname) {
                $tableHeader .= '
                <th scope="col"
                    class="px-5 py-3 bg-white font-bold border-b border-gray-200 text-gray-800  text-left text-sm  font-normal">
                    ' . $nickname . '
                </th>
                ';
            }
        }
        return $tableHeader . '</tr></thead>';
    }

    /* @Param array $table_array array contains the columns the table should exist of
     * @param array $action_array Look at tableActions() for example
     * @return string
     * @example $table_array [ 0=>['id'=>'id', 'name'=>'Naam', 'created_at'=>'datum'],
     * 1=>['id'=>'id', 'name'=>'Naam', 'created_at'=>'datum']
     * etc.];
     * Creates the body of the grid
     */
    private function tableBody(array $table_array, array $action_array): string
    {
        $tableBody = '<tbody>';
        if (!empty($table_array)) {
            foreach ($table_array as $row) {
                /** @param $row = each row of the grid */
                $tableBody .= '<tr>';
                foreach ($row as $column) {
                    /** @param $column = each column of a row */
                    $tableBody .= '
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap truncate max-w-sm">
                                ' . $column . '
                            </p>
                        </td>';
                }
                $tableBody .= !empty($action_array) ? $this->tableActions($action_array, $row[0]) : '';
                $tableBody .= '</tr>';
            }
        }
        $tableBody .= '</tbody>';
        return $tableBody;
    }


    /**
     * @param array $action_array
     * @param int $id string id of current row. Used so buttons know to what modal to refer or what record to delete.
     * @return string A <td> with all actions in it
     * @example [0=>['type'=>'view', 'object'=>'gebruiker'],]
     * Creates the action buttons in the grid
     */
    private function tableActions(array $action_array, int $id): string
    {
        $actions = "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>";
        if (!empty($action_array)) {
            foreach ($action_array as $action) {
                switch ($action['type']) {
                    /**@param string $modalName to what modal it refers */
                    case 'edit_modal':
                        $actions .= "
                        <a href='javascript:void(0);' id='editRecord' data-micromodal-trigger='" . $action['modalName'] . "-" . $id . "' class='cursor-pointer'><i class='fas fa-edit'></i>
                            </a>";
                        break;

                    /** @param string $formAction where the form needs to post to
                     * @param string $object what you want to delete
                     */
                    case 'delete':
                        $actions .= " 
                            <form class='inline' method='POST' action='" . $action['formAction'] . "'>
                                <button name='delete' value='" . $id . " ' type='submit' onclick='return confirm(\"Weet u zeker dat u " . ($action['reference'] ?? 'deze') .  " " . $action['object'] . " wil verwijderen?\")'><i class='fas fa-trash mr-1'></i></button> 
                            </form>";
                        break;

                    /** @param string $name what the post request is called
                     * @param string $formAction where the form needs to post to
                     */
                    case 'file':
                        $actions .= " 
                            <form class='inline' method='POST' action='" . $action['formAction'] . "'>
                                <button name='" . $action['name'] . "' value='" . $id . " ' type='submit' ><i class='fas fa-file-alt'></i></button> 
                            </form>";
                        break;
                    /**@param string $modalName to what modal it refers */

                    case 'view_modal':
                        $actions .= "
                            <a href='javascript:void(0);' id='viewRecord' data-micromodal-trigger='" . $action['modalName'] . "-" . $id . "' class='cursor-pointer'><i class='fas fa-eye'></i>
                            </a>";
                        break;
                    /*Add custom actions below*/
                    default:
                        $actions .= '';
                        break;
                }
            }
        }
        $actions .= '</td>';
        return $actions;
    }

    /**
     * @param array $button_array
     * @return string
     * @example : [1=>['type'=>'danger', 'name'=>'nameOfButton', 'icon'=>"<i class='fas fa-trash mr-1'></i>"],]
     */
    private function tableButtons(array $button_array): string
    {
        $buttons = '<div class="flex justify-end mt-5 mr-8"><form method="post" action="">';
        if (!empty($button_array)) {
            foreach ($button_array as $button) {
                switch ($button['type']) {
                    case 'danger': /*Delete, cancel etc.*/
                        $buttons .= '
                            <button name="' . $button['name'] . '" type="submit" class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" value="' . $button['value'] .'">
                              ' . $button['icon'] . ' ' . $button['placeholder'] . '
                            </button>';
                        break;
                    case 'primary': /*Save, continue etc.*/
                        $buttons .= '
                            <button name="' . $button['name'] . '" type="submit" class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                              ' . $button['icon'] . ' ' . $button['placeholder'] . '
                            </button>';
                        break;
                    case 'warning': /*Edit, etc.*/
                        $buttons .= '
                            <button name="' . $button['name'] . '" type="submit" class="mr-2 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                              ' . $button['icon'] . ' ' . $button['name'] . '
                            </button>';
                        break;
                    case 'primary_modal':
                        $buttons .= '
                            <button>
                                <a href="javascript:void(0);" class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                 id="' . $button['id'] . '" data-micromodal-trigger="' . $button['modalName'] . '">
                                    ' . $button['icon'] . ' ' . $button['placeholder'] . '</a>
                            </button>';
                        break;
                    case 'warning_modal':
                        $buttons .= '
                            <button>
                                <a href="javascript:void(0);" class="mr-2 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"
                                 id="' . $button['id'] . '" data-micromodal-trigger="' . $button['modalName'] . '">
                                    ' . $button['icon'] . ' ' . $button['placeholder'] . '</a>
                            </button>';
                        break;
                    /*Add custom buttons below*/
                    default:
                        $buttons .= '';
                        break;
                }
            }
        }
        $buttons .= '</form></div>';
        return $buttons;
    }

    /**
     * @param $message
     * @return string
     * Echo this function to show an error message
     */
    public function error_message($message): string
    {
        return '
    <script>setTimeout(function(){document.getElementById("error").classList.add("opacity-0")},4000);setTimeout(function(){document.getElementById("error").classList.add("hidden")},5000);</script>
                    <div id="error" class=" duration-1000 transition-opacity fixed top-0 right-0 mt-5 mr-5 flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <div class="flex items-center justify-center w-12 bg-red-500">
                            <i class="fas fa-exclamation"></i>
                        </div>

                        <div class="px-4 py-2 pb-5 -mx-3">
                            <div class="mx-3">
                                <span class="font-semibold text-red-500 dark:text-red-400">Oeps!</span>
                                <p class="text-sm text-gray-600 dark:text-gray-200">' . $message . '</p>
                            </div>
                        </div>
                    </div>
    ';
    }

    /**
     * @param $message
     * @return string
     * Echo this function to show a succes message
     */
    public function succes_message($message): string
    {
        return '
    <script>setTimeout(function(){document.getElementById("error").classList.add("opacity-0")},4000);setTimeout(function(){document.getElementById("error").classList.add("hidden")},5000);</script>
                    <div id="error" class=" duration-1000 transition-opacity fixed top-0 right-0 mt-5 mr-5 flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <div class="flex items-center justify-center w-12 bg-green-500">
                            <i class="fas fa-exclamation"></i>
                        </div>

                        <div class="px-4 py-2 pb-5 -mx-3">
                            <div class="mx-3">
                                <span class="font-semibold text-green-500 dark:text-green-400">Succes!</span>
                                <p class="text-sm text-gray-600 dark:text-gray-200">' . $message . '</p>
                            </div>
                        </div>
                    </div>
    ';
    }
}