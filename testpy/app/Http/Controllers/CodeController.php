<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class CodeController extends Controller
{
    public function runScript()
    {
        

        $process = new Process(['C:\Users\shepherd\AppData\Local\Programs\Python\Python311\python.exe', 'C:/Users/shepherd/Downloads/test.py']);
        
        try {
            $process->mustRun();
            $process->getOutput();
            // Process the output as needed
            // ...

            //dd($output);
        } catch (ProcessFailedException $exception) {
            $exception->getMessage();
            // Handle the process failure
            // ...

                //dd($errorMessage);
        }

        // $process = new Process(['python3', 'C:/Users/shepherd/Downloads/test.py']);
        // $process->run();
        
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }
    
        // $data = $process->getOutput();
        // dd($data);
        
        //shell_exec('C:\Users\shepherd\AppData\Local\Programs\Python\Python310\python.exe C:/Users/shepherd/Downloads/test.py');
        // shell_exec("C:\Users\shepherd\AppData\Local\Programs\Python\Python310\pythonw.exe C:\Users\shepherd\AppData\Local\Programs\Python\Python310\Lib\idlelib\idle.pyw C:/Users/shepherd/Downloads/test.py");
        
        

    }

//     public function runPython(){
//         $python ='C:\Users\shepherd\AppData\Local\Programs\Python\Python310\python.exe';
//         $scripts_path ='C:/Users/shepherd/Downloads/';
//         $script_name = "test.py";
//         // $process = new Process([$python, $scripts_path.$script_name]);
//         // $process->run();
//         // if (!$process->isSuccessful()) {
//         //     throw new ProcessFailedException($process);
//         // }
//         $command = $python." ".$scripts_path.$script_name;
        
//         $process = Process::fromShellCommandline($command);
//         $process->run();

//         dd($process->getOutput());
//     }



//     public function openCmd()
//     {
//         // $command = 'start C:\Users\shepherd\AppData\Local\Programs\Python\Python310\python.exe';
//         // exec($command);
//         $command2 = ' start C:\Users\shepherd\AppData\Local\Programs\Python\Python311\python.exe C:/Users/shepherd/Downloads/test.py';
//         exec($command2);

        
//         // Alternatively, you can use the `shell_exec()` function:
//         // shell_exec($command);
//         return "Command Prompt opened.";
//     }




//     public function runpiton()
//     {
//         $scriptPath = 'C:/Users/shepherd/Downloads/test.py'; // Replace with the actual path to your script
        
//         // Open the Python terminal
//         $command = 'start C:\Users\shepherd\AppData\Local\Programs\Python\Python310\python.exe';
//         pclose(popen($command, 'w'));
        
//         // Delay for a moment to allow the terminal to open
//         sleep(2);
        
//         // Run the script in the Python terminal
//         $scriptCommands = "exec(open('" . $scriptPath . "').read())";
//         $scriptCommands;
//         $this->writeToTerminal($scriptCommands);
        
//         return "Script executed in the Python terminal.";
//     }


//     private function writeToTerminal($commands)
//     {
//         $handle = fopen('php://stdout', 'w');
//         fwrite($handle, $commands);
//         fclose($handle);
//     }

    



//     public function runFile()
//     {
//         $scriptPath = 'C:/Users/shepherd/Downloads/test.py'; // Replace with the actual path to your script
        
//         // Open the Python terminal
//         $command = 'start C:\Users\shepherd\AppData\Local\Programs\Python\Python310\python.exe';
//         $process = proc_open($command, [['pipe', 'r'], ['pipe', 'w'], ['pipe', 'w']], $pipes);
        
//         // Write the script command to the terminal
//         $scriptCommand = "exec(open('" . $scriptPath . "').read())\n";
//         fwrite($pipes[0], $scriptCommand);
//         fclose($pipes[0]);
        
//         // Read the output from the terminal
//         $output = stream_get_contents($pipes[1]);
//         fclose($pipes[1]);
        
//         // Close the terminal
//         proc_close($process);
        
//         return $output;
//     }
        
}
