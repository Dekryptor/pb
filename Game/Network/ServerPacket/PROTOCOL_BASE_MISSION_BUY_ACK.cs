/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Core.Model;

namespace Game.Network.ServerPacket
{
    public class PROTOCOL_BASE_MISSION_BUY_ACK : SendPacket
    {
        private int MissionID;
        private Player player;

        public PROTOCOL_BASE_MISSION_BUY_ACK(int missionId, Player p)
        {
             this.MissionID = missionId;
             this.player = p;
        }

        public override void WriteImpl()
        {
            WriteH(0xA2E);
            WriteB(new byte[] { 0x05 });
        }
    }
}
