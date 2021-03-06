<?php
/**
 * $Id: SummaryPHPUnit2ResultFormatter.php 142 2007-02-04 14:06:00Z mrook $
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information please see
 * <http://phing.info>.
 */
 
require_once 'phing/tasks/ext/phpunit/phpunit3/PHPUnit3ResultFormatter.php';

/**
 * Prints short summary output of the test to Phing's logging system.
 *
 * @author Michiel Rook <michiel.rook@gmail.com>
 * @version $Id: SummaryPHPUnit2ResultFormatter.php 142 2007-02-04 14:06:00Z mrook $
 * @package phing.tasks.ext.phpunit
 * @since 2.1.0
 */	
class SummaryPHPUnit3ResultFormatter extends PHPUnit3ResultFormatter
{
	function endTestSuite(PHPUnit_Framework_TestSuite $suite)
	{
		$sb = "Test: " . $suite->getName();
		$sb.= ", Run: " . $this->getRunCount();
		$sb.= ", Failures: " . $this->getFailureCount();
		$sb.= ", Errors: " . $this->getErrorCount();
		$sb.= ", Incomplete: " . $this->getIncompleteCount();
		$sb.= ", Skipped: " . $this->getSkippedCount();
		$sb.= ", Time elapsed: " . sprintf('%0.5f', $this->getElapsedTime()) . " s\n";
		
		parent::endTestSuite($suite);
		
		if ($this->out != NULL)
		{
			$this->out->write($sb);
			$this->out->close();
		}
	}
	
	function getExtension()
	{
		return NULL;
	}
}

