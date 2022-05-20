with Ada.Containers; use Ada.Containers;
with Ada.Containers.Vectors;
with Ada.Text_IO; use Ada.Text_IO;

procedure Main is
	package Integer_Vector is new Ada.Containers.Vectors (Index_Type => Natural, Element_Type => Integer);
	use Integer_Vector;

	Stack : Vector;

	procedure Push (s : in out Vector; v : Integer) is
	begin
		s.Append(v);
	end Push;

	-- A messy pop function
	-- Makes full use of Containers.Vectors
	function Pop (s : in out Vector) return Integer is
		v : Integer;
	begin
		for I in s.Last_Index .. s.Last_Index loop
			v := s(I);
		end loop;

		s.Delete(s.Last_Index);

		return v;
	end Pop;

	-- Simply iterates over the vecotr until it has the largest value
	function Max (s : in Vector) return Integer is
		v : Integer := 0;
	begin
		for I in s.Iterate loop
			if s(I) > v then
				v := s(I);
			end if;
		end loop;

		return v;
	end Max;
begin
	Push(Stack, 1);
	Push(Stack, 15);
	Push(Stack, 33);
	Push(Stack, 78);
	Push(Stack, 123);
	Push(Stack, 3);
	Put("Max is: "); Put(Integer'Image(Max(Stack))); New_Line;
	Put("Popping top of stack: "); Put(Integer'Image(Pop(Stack))); New_Line;
	Put("Popping top of stack: "); Put(Integer'Image(Pop(Stack))); New_Line;
	Put("Max is: "); Put(Integer'Image(Max(Stack))); New_Line;
end Main;
