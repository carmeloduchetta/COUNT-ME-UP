/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package net.bbc.counting.controller;

/**
 *
 * @author Connaught
 */
public final class Definitions  {

  public static String CURRENT_PROJECT = "Default Project Name";
  
  /**
   The caller references the constants using <tt>Definitions.EMPTY_STRING</tt>, 
   and so on. Thus, the caller should be prevented from constructing objects of 
   this class, by declaring this private constructor. 
  */
  
  private Definitions(){
    //this prevents even the native class from 
    //calling this constructor as well :
    throw new AssertionError();
  }
}
 
